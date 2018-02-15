<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('calendar');
    }
    
    public function index() {
        
        parent::mainpage('calendar/index',
            [
                'title' => 'Calendar',
            ]
        );
     }

    public function get_events() 
    {
        // Our Stand and End Dates
        // Our Stand and End Dates
        $start = clean_data($this->input->get("start"));
        $end = clean_data($this->input->get("end"));

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $format2 = $enddt->format('Y-m-d H:i:s');
        
        $events = $this->Crud_model->get_events($format, 
            $format2);

        $data_events = array();
        foreach($events->result() as $r) { 

            $data_events[] = array(
                "id" => $r->id,
                "title" => $r->title,
                "description" => $r->description,
                "start" => $r->start,
                "end" => date('Y-m-d',strtotime($r->end."+1 day")) ,
                "edit_end" => $r->end ,
            );
        }
        echo json_encode(array("events" => $data_events));
        // echo json_encode($data_events);
        // exit();
    }

    public function add_event() 
    {
        /* Our calendar data */
        $name = clean_data($this->input->post("name"));
        $desc = clean_data($this->input->post("description"));
        $start_date = clean_data($this->input->post("start_date"));
        $end_date = clean_data($this->input->post("end_date"));

        // if(!empty($start_date)) {
        //     $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
        //     $start_date = $sd->format('Y-m-d H:i:s');
        //     $start_date_timestamp = $sd->getTimestamp();
        // } else {
        //     $start_date = date("Y-m-d H:i:s", time());
        //     $start_date_timestamp = time();
        // }

        // if(!empty($end_date)) {
        //     $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
        //     $end_date = $ed->format('Y-m-d H:i:s');
        //     $end_date_timestamp = $ed->getTimestamp();
        // } else {
        //     $end_date = date("Y-m-d H:i:s", time());
        //     $end_date_timestamp = time();
        // }

        $this->Crud_model->add_event(array(
            "title" => $name,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date,
            "user_id"   => $this->user->info('id')
            )
        );

        redirect(site_url("calendar"));
    }

    public function edit_event() 
    {
        $eventid = intval($this->input->post("eventid"));
        $event = $this->Crud_model->get_event($eventid);
        if($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = clean_data($this->input->post("name"));
        $desc = clean_data($this->input->post("description"));
        $start_date = clean_data($this->input->post("start_date"));
        $end_date = clean_data($this->input->post("end_date"));
        $delete = intval($this->input->post("delete"));

        if(!$delete) {

            // if(!empty($start_date)) {
            //     $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
            //     $start_date = $sd->format('Y-m-d H:i:s');
            //     $start_date_timestamp = $sd->getTimestamp();
            // } else {
            //     $start_date = date("Y-m-d H:i:s", time());
            //     $start_date_timestamp = time();
            // }

            // if(!empty($end_date)) {
            //     $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
            //     $end_date = $ed->format('Y-m-d H:i:s');
            //     $end_date_timestamp = $ed->getTimestamp();
            // } else {
            //     $end_date = date("Y-m-d H:i:s", time());
            //     $end_date_timestamp = time();
            // }


            $this->Crud_model->update_event($eventid, array(
                "title" => $name,
                "description" => $desc,
                "start" => $start_date,
                "end" => $end_date,
                )
            );
            
        } else {
            $this->Crud_model->delete_event($eventid);
        }

        redirect(site_url("calendar"));
    }
}