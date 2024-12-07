<?php

namespace App\Controllers;

use App\Models\ScheduleModel;

class ScheduleController extends BaseController
{
    public function index()
    {
        $scheduleModel = new ScheduleModel();
        $data['schedules'] = $scheduleModel
            ->select('schedules.*, events.title as event_title')
            ->join('events', 'events.id = schedules.event_id', 'left')
            ->findAll();

        return view('schedules/index', $data);
    }

    public function create()
    {
        $eventModel = new \App\Models\EventModel();
        $data['events'] = $eventModel->findAll();

        if ($this->request->getMethod() === 'post') {
            $scheduleModel = new ScheduleModel();
            $dataSchedule = [
                'event_id' => $this->request->getPost('event_id'),
                'schedule_date' => $this->request->getPost('schedule_date'),
                'activity' => $this->request->getPost('activity'),
            ];

            $scheduleModel->save($dataSchedule);
            return redirect()->to('/schedules')->with('success', 'Schedule added successfully.');
        }

        return view('schedules/create', $data);
    }


    public function edit($id)
    {
        $scheduleModel = new ScheduleModel();
        $eventModel = new \App\Models\EventModel(); // Pastikan EventModel sudah dibuat
        $data['schedule'] = $scheduleModel->find($id);
        $data['events'] = $eventModel->findAll(); // Mengambil semua event untuk dropdown

        return view('schedules/edit', $data);
    }

    public function update($id)
    {
        $scheduleModel = new ScheduleModel();
        $data = [
            'event_id' => $this->request->getPost('event_id'),
            'schedule_date' => $this->request->getPost('schedule_date'),
            'activity' => $this->request->getPost('activity'),
        ];

        $scheduleModel->update($id, $data);
        return redirect()->to('/schedules')->with('success', 'Schedule updated successfully.');
    }

    public function delete($id)
    {
        $scheduleModel = new ScheduleModel();
        $scheduleModel->delete($id);

        return redirect()->to('/schedules')->with('success', 'Schedule deleted successfully.');
    }
}
