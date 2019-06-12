<?php

namespace Sinjirite\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Input;
use Sinjirite\Http\Requests;
use Carbon\Carbon;
use Sinjirite\Offer;
use Intervention\Image\Facades\Image as Image;

class OfferController extends Controller
{
    protected $offers;

    public function __construct(Offer $offers)
    {
        $this->offers = $offers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $offers = $this->offers->orderBy('published_at', 'desc')->paginate(10);

        return view('admin.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Offer $offer)
    {
        return view('admin.offer.form', compact('offer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
//        $this->offers->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
//        $offer = $this->offers->findOrFail($id);

        return view('admin.offer.form', compact('offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreOfferRequest $request)
    {
        $uploadedImage = $request->file('image');

        if ($uploadedImage && $uploadedImage->isValid()) {

            $extension = $uploadedImage->getClientOriginalExtension();
            $destinationPath = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . config('offer.imagePath');
            $newFileName = str_slug($request->input('title'), '_') . '_' . rand(11111,99999) . '.' . $extension;

            Image::make($request->file('image'))
                ->fit(220, 220)
                ->save($destinationPath . $newFileName);


            $offer = $this->offers->create(
                [
                    'pic' => config('offer.imagePath') . $newFileName,
                    'published_at' => Carbon::createFromFormat('d.m.Y', $request->input('published_at')),
                    'down_at' => Carbon::createFromFormat('d.m.Y', $request->input('down_at')),
                ] + $request->only('title', 'body')
            );

            return redirect(route('admin.offer.edit', $offer->id))->with('status', 'Офертата беше създадена успешно.');
        }

        return false;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateOfferRequest $request, Offer $offer)
    {
        $uploadedImage = $request->file('image');

        if ($uploadedImage && $uploadedImage->isValid()) {

            $extension = $uploadedImage->getClientOriginalExtension();
            $destinationPath = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . config('offer.imagePath');
            $newFileName = str_slug($request->input('title'), '_') . '_' . rand(11111,99999) . '.' . $extension;

            Image::make($request->file('image'))
                ->fit(220, 220)
                ->save($destinationPath . $newFileName);

            $offer->pic = config('offer.imagePath') . $newFileName;
        }

        $offer->fill(
            [
                'published_at' => Carbon::createFromFormat('d.m.Y', $request->input('published_at')),
                'down_at' => Carbon::createFromFormat('d.m.Y', $request->input('down_at')),
            ] + $request->only('title', 'body'))->save();

        return redirect(route('admin.offer.edit', $offer->id))->with('status', 'Офертата беше обновена успешно.');
    }


    public function confirm(Offer $offer)
    {
        return view('admin.offer.confirm', compact('offer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect(route('admin.offer.index'))
            ->with('status', 'Офертата <strong>"' . $offer->title . '"</strong> беше изтрита успешно.');
    }

}