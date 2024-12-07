<?php

namespace App\Controllers;

use App\Models\OrganizerModel;
use App\Models\EventModel;

class OrganizerController extends BaseController
{
    public function index()
    {
        $organizerModel = new OrganizerModel();
        $data['organizers'] = $organizerModel->findAll();

        return view('organizers/index', $data);
    }

    public function create()
    {
        helper(['form']);
        $eventModel = new EventModel(); // Pastikan EventModel tersedia
        $data['events'] = $eventModel->findAll();

        if ($this->request->getMethod() == 'post') {
            $organizerModel = new OrganizerModel();
            $newData = [
                'name' => $this->request->getPost('name'),
                'contact_info' => $this->request->getPost('contact_info'),
                'event_id' => $this->request->getPost('event_id'),
            ];

            $organizerModel->save($newData);
            return redirect()->to('/organizers');
        }

        return view('organizers/create', $data);
    }

    public function edit($id = null)
    {
        $organizerModel = new OrganizerModel();
        $eventModel = new EventModel();

        $organizer = $organizerModel->find($id);

        if (!$organizer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Organizer tidak ditemukan');
        }

        $data['organizer'] = $organizer;
        $data['events'] = $eventModel->findAll();
        $data['event_id'] = $organizer['event_id'] ?? null; // Gunakan null jika event_id tidak ditemukan

        if ($this->request->getMethod() == 'post') {
            $updatedData = [
                'name' => $this->request->getPost('name'),
                'contact_info' => $this->request->getPost('contact_info'),
                'event_id' => $this->request->getPost('event_id'),
            ];

            $organizerModel->update($id, $updatedData);
            return redirect()->to('/organizers');
        }

        return view('organizers/edit', $data);
    }

    public function update($id = null)
    {
        $organizerModel = new OrganizerModel();

        // Pastikan ID organizer valid
        $organizer = $organizerModel->find($id);
        if (!$organizer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Organizer tidak ditemukan');
        }

        // Validasi input
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'contact_info' => 'required|min_length[3]|max_length[255]',
            'event_id' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan diperbarui
        $updatedData = [
            'name' => $this->request->getPost('name'),
            'contact_info' => $this->request->getPost('contact_info'),
            'event_id' => $this->request->getPost('event_id'),
        ];

        // Proses update
        $organizerModel->update($id, $updatedData);

        // Redirect ke halaman daftar organizers
        return redirect()->to('/organizers')->with('success', 'Organizer berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        $organizerModel = new OrganizerModel();

        $organizer = $organizerModel->find($id);
        if (!$organizer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Organizer tidak ditemukan');
        }

        $organizerModel->delete($id);
        return redirect()->to('/organizers');
    }
}
