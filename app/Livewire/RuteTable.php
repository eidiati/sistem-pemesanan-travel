<?php

namespace App\Livewire;

use App\Models\Rute;

use Livewire\Component;
use Livewire\WithPagination;

class RuteTable extends Component
{
    protected $listeners = [
        'editRute'
    ];

    public $rutes;
    public $selectRuteId;
    public $namaRute;
    public $descRute;
    public $search = '';
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        $rute = Rute::query()
        ->where(function ($query) {
            $query->where('nama_kota', 'LIKE', "%{$this->search}%")
            ->orWhere('desc', 'LIKE', "%{$this->search}%");
            
        })
        ->paginate(5);
        return view('livewire.rute-table', compact('rute'));
    }

    public function changeDelete($ruteId) {
        $this->selectRuteId = $ruteId;
    }

    public function deleteRute() {
        if($this->selectRuteId == 0) {
            return;
        }

        $rute = Rute::findOrFail($this->selectRuteId);
        $rute->delete();
        $this->selectRuteId = 0;
        return redirect('/admin/rute')->with('success', 'Kota berhasil dihapus');
    }


    public function changeEdit($ruteId) {    
        $rute = Rute::findOrFail($ruteId);
        $this->selectRuteId = $ruteId;
        $this->namaRute = $rute->nama_kota;
        $this->descRute = $rute->desc;
        // dd($this->selectRuteId, $this->namaRute, $this->descRute);
    }

    public function editRute() {
        if($this->selectRuteId == 0) {
            return;
        }
        $rute = Rute::findOrFail($this->selectRuteId);
        $rute->nama_kota = $this->namaRute;
        $rute->desc = $this->descRute;
        $rute->save();
        // return redirect('/rute/edit/'.$this->selectRuteId);
        return redirect('/admin/rute')->with('success', 'Kota berhasil diperbarui');
    }
}
