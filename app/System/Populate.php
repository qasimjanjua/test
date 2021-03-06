<?php

namespace App\System;

use Carbon\Exceptions\Exception;
use App\Models\candidate;
use App\Models\job;
use Carbon\Carbon;
/**
 * Populate short summary.
 *
 * Populate description.
 *
 * @version 1.0
 * @author qasim
 */
class Populate
{
    public function readCsv()
    {
        try{
            $candidates = public_path().'/csv/candidates.csv';
            $jobs = public_path().'/csv/jobs.csv';

            $this->createCandidate($candidates);
            $this->createJobs($jobs);
            $this->displayData();
        }
        catch(Exception $e)
        {
            print($e->getMessage());
        }
    }
    public function createCandidate($candidates)
    {
        $canditatesList = [];

        if(file_exists($candidates))
        {

            if (($open = fopen($candidates, "r")) !== FALSE) {

                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    #check
                    //$check = candidate::where('id',$data[0])->first();
                    //if(!$check)
                    //{
                        $da = [];
                        $da['id'] = $data[0];
                        $da['first_name'] = $data[1];
                        $da['last_name'] = $data[2];
                        $da['email'] = $data[3];

                        $canditatesList[] = $da;
                    //}
                }

                fclose($open);
            }
            candidate::insert($canditatesList);
            return true;
        }
        return false;
    }
    public function createJobs($jobs)
    {
        if(file_exists($jobs))
        {
            $jobsList = [];

            if (($open = fopen($jobs, "r")) !== FALSE) {

                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $jl = [];
                    #check
                    //$check = job::where([['candidates_id',(int)$data[1]],['job_title',$data[2]]])->first();
                    //if(!$check)
                    //{
                        $jl['id'] = (int)$data[0];
                        $jl['candidates_id'] = $data[1];
                        $jl['job_title'] = $data[2];
                        $jl['company_name'] = $data[3];
                        $jl['start_date'] = \DateTime::createFromFormat('d.m.Y H:i', $data[4]);
                        $jl['end_date'] = \DateTime::createFromFormat('d.m.Y H:i', $data[5]);
                        //dd($data[5]);
                        $jobsList[] = $jl;
                    //}
                }

                fclose($open);
            }
            job::insert($jobsList);
            return true;
        }
        return false;
    }
    public function displayData()
    {
        $candidates = candidate::all();
        foreach($candidates as $candidate)
        {
            echo("$candidate->first_name $candidate->last_name ");
            $sortedCandidateJobs = $candidate->sortedCandidateJobs();
            foreach($sortedCandidateJobs as $job)
            {
                echo ("\n\tJob Title:  $job->job_title \n\tCompany Name: $job->company_name \n\tStart Date:". Carbon::createFromFormat('Y-m-d H:i:s', $job->start_date)->format('Y-m-d H:i:s')."\n\tEnd Date: ".  Carbon::createFromFormat('Y-m-d H:i:s', $job->end_date)->format('Y-m-d H:i:s')."\n");
            }
        }
    }
}
