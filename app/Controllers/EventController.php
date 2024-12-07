<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;
use App\Models\OrganizerModel;

class EventController extends Controller
{
    // Menampilkan daftar semua event
    public function index()
    {
        $eventModel = new EventModel();
        $events = $eventModel->select('events.*, organizers.name as organizer_name')
            ->join('organizers', 'organizers.id = events.organizer_id')
            ->findAll();

        $data['events'] = $events;
        return view('events/index', $data);
    }

    // Menampilkan halaman form untuk membuat event baru
    public function create()
    {
        helper(['form']);
        $organizerModel = new OrganizerModel();
        $eventModel = new EventModel();

        if ($this->request->getMethod() === 'post') {
            // Simpan Organizer Baru
            $organizerData = [
                'name' => $this->request->getPost('organizer_name'),
                'contact_info' => $this->request->getPost('organizer_contact'),
            ];
            $organizerModel->save($organizerData);
            $organizerId = $organizerModel->getInsertID();

            // Simpan Event Baru
            $eventData = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'date' => $this->request->getPost('date'),
                'location' => $this->request->getPost('location'),
                'organizer_id' => $organizerId,
            ];
            $eventModel->save($eventData);

            return redirect()->to('/events')->with('success', 'Event berhasil ditambahkan beserta Organizer.');
        }

        return view('events/create');
    }

    // Menampilkan halaman form untuk mengedit event
    public function edit($id = null)
    {
        $eventModel = new EventModel();
        $organizerModel = new OrganizerModel();

        $event = $eventModel->find($id);
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event tidak ditemukan');
        }

        $data['event'] = $event;
        $data['organizers'] = $organizerModel->findAll();

        return view('events/edit', $data);
    }

    // Mengupdate data event
    public function update($id = null)
    {
        $eventModel = new EventModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'date' => $this->request->getPost('date'),
            'location' => $this->request->getPost('location'),
            'organizer_id' => $this->request->getPost('organizer_id'),
        ];

        $eventModel->update($id, $data);
        return redirect()->to('/events')->with('success', 'Event berhasil diperbarui.');
    }

    // Menghapus event
    public function delete($id = null)
    {
        $eventModel = new EventModel();
        $eventModel->delete($id);

        return redirect()->to('/events')->with('success', 'Event berhasil dihapus.');
    }
}
