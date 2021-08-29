<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateHostForm extends Component
{
    public $user, $goal, $show_goal;
    public function mount()
    {
        $this->user = User::find( auth()->user()->id );
        $this->goal = $user->UserMeta->goal;
        $this->show_goal = $user->UserMeta->show_goal;
    }
    public function render()
    {
        return view('livewire.admin.hosts.update-host-form');
    }
    public function saveUserShowGoal()
    {
        $meta = DB::table('user_meta')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_goal' => $this->show_goal,
            ]);
    }

    public function saveUserGoal()
    {
        $meta = DB::table('user_meta')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'goal' => $this->goal,
            ]);
    }


}
