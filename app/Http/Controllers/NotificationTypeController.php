<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\NotificationType;
use App\Http\Requests\NotificationTypeStoreRequest;
use App\Http\Requests\NotificationTypeUpdateRequest;

class NotificationTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $notificationTypes = NotificationType::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.notification_types.index',
            compact('notificationTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $statuses = Status::pluck('name', 'id');

        return view('app.notification_types.create', compact('statuses'));
    }

    /**
     * @param \App\Http\Requests\NotificationTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationTypeStoreRequest $request)
    {
        $validated = $request->validated();

        $notificationType = NotificationType::create($validated);

        return redirect()->route('notification-types.edit', $notificationType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NotificationType $notificationType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, NotificationType $notificationType)
    {
        return view('app.notification_types.show', compact('notificationType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NotificationType $notificationType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, NotificationType $notificationType)
    {
        $statuses = Status::pluck('name', 'id');

        return view(
            'app.notification_types.edit',
            compact('notificationType', 'statuses')
        );
    }

    /**
     * @param \App\Http\Requests\NotificationTypeUpdateRequest $request
     * @param \App\Models\NotificationType $notificationType
     * @return \Illuminate\Http\Response
     */
    public function update(
        NotificationTypeUpdateRequest $request,
        NotificationType $notificationType
    ) {
        $validated = $request->validated();

        $notificationType->update($validated);

        return redirect()->route('notification-types.edit', $notificationType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NotificationType $notificationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        NotificationType $notificationType
    ) {
        $notificationType->delete();

        return redirect()->route('notification-types.index');
    }
}
