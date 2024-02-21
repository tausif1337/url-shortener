<?php

namespace App\Actions\Fortify;
use App\Models\User;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\RegistrationApproved;
use App\Models\SampleRun;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\Qc;


class Users
{
    public function userVerification()
    {
        $users = User::where('user_status', 0)->get();
        return view('pages.dashboard.user_verification', compact('users'));
    }

    public function userRole()
    {
        $users = User::where('user_status', 1)->get();
        return view('pages.dashboard.user_role', compact('users'));
    }

    public function updateUserStatus(Request $request) {
        $statusesData = $request->input('status', []);

        foreach ($statusesData as $userId => $status) {
            $user = User::findOrFail($userId);

            // Update the user's status
            $user->user_status = $status;
            $user->save();
            $user->notify(new RegistrationApproved($user));
        }
        return redirect()->back()->with('message', 'User Status Updated Successfully.');
    }

    public function updateUserRole(Request $request) {
        $rolesData = $request->input('role', []);

        foreach ($rolesData as $userId => $roleId) {
            $user = User::findOrFail($userId);

            // Update the user's role
            $user->roles()->sync([$roleId]);
        }
        return redirect()->back()->with('message', 'User Role Updated Successfully.');
    }

    public function deleteUser($id)
    {
        $existsInProjects = Project::where('created_by', $id)->exists();
        $existsInQCs = Qc::where('created_by', $id)->exists();
        $existsInSampleRuns = SampleRun::where('created_by', $id)->exists();

        if ($existsInProjects || $existsInQCs || $existsInSampleRuns)
        {
            return redirect()->back()->with('error', 'Deletion failed. Record is associated with other records.');
        }
        else {
            User::findOrFail($id)->delete();
            return redirect()->back()->with('message', 'User Deleted Successfully.');
        }
    }
}
