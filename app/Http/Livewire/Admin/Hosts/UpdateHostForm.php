<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateHostForm extends Component
{
    public $user, $show_total, $goal, $show_goal, $show_items, $rationale, $show_rationale;
    public function mount()
    {
        $this->user = User::find( auth()->user()->id );
        $this->goal = $this->user->UserMeta->goal;
        $this->show_total = $this->user->UserMeta->show_total;
        $this->show_goal = $this->user->UserMeta->show_goal;
        $this->show_items = $this->user->UserMeta->show_items;
        $this->rationale = $this->user->UserMeta->rationale;
        $this->show_rationale = $this->user->UserMeta->show_rationale;
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

    public function saveUserShowItems()
    {
        $this->show_items = !$this->show_items;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_items' => $this->show_items,
            ]);
    }

    public function saveUserShowRationale()
    {
        $this->show_rationale = !$this->show_rationale;
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'show_rationale' => $this->show_rationale,
            ]);
    }

    public function saveUserRationle()
    {
        $meta = DB::table('user_metas')
            ->where('user_id', '=', auth()->user()->id )
            ->update([
                'rationale' => $this->rationale,
            ]);
    }


}
