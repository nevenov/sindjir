<?php

namespace Sinjirite\Http\Controllers;

use Sinjirite\Http\Requests;
use Carbon\Carbon;
use Sinjirite\Message;
use Intervention\Image\Facades\Image as Image;

class MessageController extends Controller
{
    protected $messages;

    public function __construct(Message $messages)
    {
        $this->messages = $messages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $messages = $this->messages->orderBy('published_at', 'desc')->paginate(10);

        return view('admin.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Message $message)
    {
        return view('admin.message.form', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
//        $this->offers->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
//        $offer = $this->offers->findOrFail($id);

        return view('admin.message.form', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreMessageRequest $request)
    {
        $message = $this->messages->create(
            [
                'published_at' => Carbon::createFromFormat('d.m.Y', $request->input('published_at')),
                'down_at' => Carbon::createFromFormat('d.m.Y', $request->input('down_at')),
            ] + $request->only('body')
        );

        return redirect(route('admin.message.edit', $message->id))->with('status', 'Съобщението беше създадена успешно.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateMessageRequest $request, Message $message)
    {
        $message->fill(
            [
                'published_at' => Carbon::createFromFormat('d.m.Y', $request->input('published_at')),
                'down_at' => Carbon::createFromFormat('d.m.Y', $request->input('down_at')),
            ] + $request->only('body'))->save();

        return redirect(route('admin.message.edit', $message->id))->with('status', 'Съобщението беше обновено успешно.');
    }


    public function confirm(Message $message)
    {
        return view('admin.message.confirm', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect(route('admin.message.index'))
            ->with('status', 'Съобщението <strong>"' . str_limit(strip_tags($message->body), 100) . '"</strong> беше изтрито успешно.');
    }

}