<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateHostForm extends Component
{
    public $user, $show_total, $goal, $show_goal;
    public function mount()
    {
        $this->user = User::find( auth()->user()->id );
        $this->goal = $this->user->UserMeta->goal;
        $this->show_total = $this->user->UserMeta->show_total;
        $this->show_goal = $this->user->UserMeta->show_goal;
    }
    public function render()
    {
        return view('livewire.admin.hosts.update-host-form');
    }

    public function saveUserShowTotal()
    {
        $this->show_total = !$this->show_total;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_total' => $this->show_total,
            ]);
    }

    public function saveUserShowGoal()
    {
        $this->show_goal = !$this->show_goal;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_goal' => $this->show_goal,
            ]);
    }

    public function saveUserGoal()
    {
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'goal' => $this->goal,
            ]);
    }


}
