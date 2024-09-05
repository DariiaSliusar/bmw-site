<?php

namespace App\Http\Controllers;

use App\Enums\NotificationStatusEnum;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function contactForm(ContactFormRequest $request)
    {
        $formData = $request->validated();

        $notification = Notification::query()->create([
            'name' => 'contact form',
            'payload' => $formData,
        ]);

        try {
            Mail::to('dariiasliusar@gmail.com')->send(new ContactFormMail($notification));
            $notification->status = NotificationStatusEnum::SENT->value;
        } catch (\Exception $exception) {
            $notification->status = NotificationStatusEnum::FAILED->value;
            dd($exception->getMessage());
        }

        $notification->save();


        return back()->with('success', 'Thanks for contacting us!');
    }

    public function list()
    {
        $notifications = Notification::query()->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.notifications.list', compact('notifications'));
    }

    public function show($id)
    {
        $notification = Notification::query()->where('id', $id )->first();
        return view('dashboard.notifications.show', compact('notification'));
    }

    public function destroy($id)
    {
        Notification::query()->where('id', $id)->delete();
        return redirect()->route('dashboard.notifications.list')->with('success', trans('Removed ').' id: '.$id);
    }
}
