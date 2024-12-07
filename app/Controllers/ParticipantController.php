<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ParticipantModel;
use App\Models\EventModel;
use App\Models\UserModel;
use Config\Database;

class ParticipantController extends Controller
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $participantModel = new ParticipantModel();
        $userModel = new UserModel();
        $eventModel = new EventModel();

        $participants = $participantModel->findAll();

        foreach ($participants as &$participant) {
            $participant['user_name'] = $userModel->find($participant['user_id'])['name'] ?? 'Unknown User';
            $participant['event_title'] = $eventModel->find($participant['event_id'])['title'] ?? 'Unknown Event';
        }

        $data['participants'] = $participants;

        return view('participants/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post') {
            $participantModel = new ParticipantModel();

            // Validasi event_id dan user_id
            $event_id = $this->request->getPost('event_id');
            $user_id = $this->request->getPost('user_id');

            if (!$this->db->table('events')->where('id', $event_id)->countAllResults()) {
                return redirect()->back()->with('error', 'Event ID not found.');
            }

            if (!$this->db->table('users')->where('id', $user_id)->countAllResults()) {
                return redirect()->back()->with('error', 'User ID not found.');
            }

            $data = [
                'user_id' => $user_id,
                'event_id' => $event_id
            ];
            $participantModel->save($data);
            return redirect()->to('/participants')->with('success', 'Participant added successfully.');
        }

        // Ambil semua events dan users untuk dropdown
        $data['events'] = $this->db->table('events')->get()->getResultArray();
        $data['users'] = $this->db->table('users')->get()->getResultArray();

        return view('participants/create', $data);
    }

    public function edit($id)
    {
        $participantModel = new ParticipantModel();
        $data['participant'] = $participantModel->find($id);
        $data['events'] = $this->db->table('events')->get()->getResultArray();
        $data['users'] = $this->db->table('users')->get()->getResultArray();

        return view('participants/edit', $data);
    }
    public function update($id)
    {
        $participantModel = new ParticipantModel();
        $data = [
            'user_id' => $this->request->getPost('user_id')
        ];
        $participantModel->update($id, $data);
        return redirect()->to('/participants')->with('success', 'Participant updated successfully.');
    }

    public function delete($id)
    {
        $participantModel = new ParticipantModel();
        $participantModel->delete($id);
        return redirect()->to('/participants')->with('success', 'Participant deleted successfully.');
    }
}
