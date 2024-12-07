<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\FeedbackModel;
use App\Models\TicketModel;
use App\Models\OrganizerModel;
use App\Models\ScheduleModel;

class DashboardController extends ResourceController
{
    /**
     * Display the dashboard with summary counts.
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function index()
    {
        // Load models
        $eventModel = new EventModel();
        $participantModel = new ParticipantModel();
        $feedbackModel = new FeedbackModel();
        $ticketModel = new TicketModel();
        $organizerModel = new OrganizerModel();
        $scheduleModel = new ScheduleModel();
        


        // Fetch counts for dashboard
        $data = [
            'totalEvents' => $eventModel->countAll(),
            'totalParticipants' => $participantModel->countAll(),
            'totalFeedbacks' => $feedbackModel->countAll(),
            'totalTickets' => $ticketModel->countAll(),
            'totalOrganizers' => $organizerModel->countAll(),
            'totalSchedules' => $scheduleModel->countAll(),
        ];


        // Load dashboard view
        return view('dashboard/index', $data);
    }
}
