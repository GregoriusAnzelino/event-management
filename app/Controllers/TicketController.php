<?php

namespace App\Controllers;

use App\Models\TicketModel;
use CodeIgniter\Controller;

class TicketController extends Controller
{
    public function index()
    {
        $model = new TicketModel();
        $data['tickets'] = $model->findAll();
        return view('tickets/index', $data);
    }

    public function create()
    {
        $eventModel = new \App\Models\EventModel();
        $participantModel = new \App\Models\ParticipantModel();

        $data['events'] = $eventModel->findAll();
        $data['participants'] = $participantModel->findAll();

        if ($this->request->getMethod() == 'post') {
            $model = new TicketModel();
            $data = [
                'event_id' => $this->request->getPost('event_id'),
                'participant_id' => $this->request->getPost('participant_id'),
                'ticket_number' => $this->request->getPost('ticket_number'),
                'ticket_price' => $this->request->getPost('ticket_price')
            ];
            $model->save($data);
            return redirect()->to('/tickets');
        }

        return view('tickets/create', $data);
    }


    public function edit($id)
    {
        $model = new TicketModel();
        $eventModel = new \App\Models\EventModel();
        $participantModel = new \App\Models\ParticipantModel();

        $data['ticket'] = $model->find($id);
        if (!$data['ticket']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
        }

        $data['events'] = $eventModel->findAll();
        $data['participants'] = $participantModel->findAll();

        return view('tickets/edit', $data);
    }


    public function update($id)
    {
        $model = new TicketModel();
        $data = [
            'event_id' => $this->request->getPost('event_id'),
            'participant_id' => $this->request->getPost('participant_id'),
            'ticket_number' => $this->request->getPost('ticket_number'),
            'ticket_price' => $this->request->getPost('ticket_price')
        ];
        $model->update($id, $data);
        return redirect()->to('/tickets');
    }

    public function delete($id)
    {
        $model = new TicketModel();
        $model->delete($id);
        return redirect()->to('/tickets');
    }
}
