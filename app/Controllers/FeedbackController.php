<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use App\Models\EventModel;
use App\Models\UserModel;

class FeedbackController extends BaseController
{
    public function index()
    {
        $feedbackModel = new FeedbackModel();
        $data['feedbacks'] = $feedbackModel
            ->select('feedbacks.*, events.title as event_title, users.name as user_name')
            ->join('events', 'events.id = feedbacks.event_id', 'left')
            ->join('users', 'users.id = feedbacks.user_id', 'left')
            ->findAll();

        return view('feedbacks/index', $data);
    }

    public function create()
    {
        $eventModel = new EventModel();
        $userModel = new UserModel();
        $data['events'] = $eventModel->findAll();
        $data['users'] = $userModel->findAll();

        if ($this->request->getMethod() === 'post') {
            $feedbackModel = new FeedbackModel();
            $dataToSave = [
                'event_id' => $this->request->getPost('event_id'),
                'user_id' => $this->request->getPost('user_id'),
                'feedback_text' => $this->request->getPost('feedback_text'),
                'rating' => $this->request->getPost('rating'),
            ];

            $feedbackModel->save($dataToSave);
            return redirect()->to('/feedbacks')->with('success', 'Feedback added successfully.');
        }

        return view('feedbacks/create', $data);
    }

    public function edit($id)
    {
        $feedbackModel = new FeedbackModel();
        $eventModel = new EventModel();
        $userModel = new UserModel();
        
        $data['feedback'] = $feedbackModel->find($id);
        $data['events'] = $eventModel->findAll();
        $data['users'] = $userModel->findAll();

        return view('feedbacks/edit', $data);
    }

    public function update($id)
    {
        $feedbackModel = new FeedbackModel();
        $data = [
            'event_id' => $this->request->getPost('event_id'),
            'user_id' => $this->request->getPost('user_id'),
            'feedback_text' => $this->request->getPost('feedback_text'),
            'rating' => $this->request->getPost('rating'),
        ];

        $feedbackModel->update($id, $data);
        return redirect()->to('/feedbacks')->with('success', 'Feedback updated successfully.');
    }

    public function delete($id)
    {
        $feedbackModel = new FeedbackModel();
        $feedbackModel->delete($id);

        return redirect()->to('/feedbacks')->with('success', 'Feedback deleted successfully.');
    }
}
