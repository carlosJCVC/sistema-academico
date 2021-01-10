<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulantRequest;
use App\Postulant;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PDF;
use DB;
use App\Announcement;

class PostulantController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        $items = DB::table('items')->get();

        return View('postulant_register', ['announcement' => $announcement, 'items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostulantRequest $request, Announcement $announcement)
    {
        $input = $request->all();

        $postulant = new Postulant($input);
        $postulant->save();

        DB::table('announcement_user')->insert([
            'user_id' => $postulant->id,
            'announcement_id' => $announcement->id,
        ]);

        return redirect(route('postulants.show', ['announcement' => $announcement, 'postulant' => $postulant]));
        //->with([ 'message' => 'User creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Store a newly updated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Postulant $postulant)
    {
        $items = DB::table('items')->get();

        return View('postulants.edit', ['announcement' => $announcement, 'postulant' => $postulant, 'items' => $items]);
    }

    /**
     * Update a newly updated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PostulantRequest $request, Announcement $announcement, Postulant $postulant)
    {
        $input = $request->all();
        $postulant->update($input);

        return redirect(route('postulants.show', ['announcement' => $announcement, 'postulant' => $postulant]));
        //->with([ 'message' => 'User creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement, Postulant $postulant)
    {
        $item = Item::find($postulant->item_id);

        return View('postulants.show', ['announcement' => $announcement, 'postulant' => $postulant, 'item' => $item]);
    }

    public function print(Postulant $postulant)
    {
        // $item = Item::find($postulant->item_id);
        $users = \App\User::all();
        $users->load('roles');

        $title = "Reporte lista de Usuarios";
        // $data = [
        //     'name' => $postulant->name,
        //     'lastname' => $postulant->lastname,
        //     'ci' => $postulant->ci,
        //     'cod_sis' => $postulant->cod_sis,
        //     'email' => $postulant->email,
        //     'phone' => $postulant->phone,
        //     'gender' => $postulant->gender,
        //     'address' => $postulant->address,
        //     'auxiliar_name' => $postulant->auxiliar_name,
        //     'nro_docs' => $postulant->nro_docs,
        //     'nro_certificates' => $postulant->nro_certificates,
        //     'item_name' => $item->name,
        //     'item_code' => $item->code,
        // ];


        /*
        $data = [
            'name' => 'Carlos',
            'lastname' => 'Veizaga Cabrera',
            'ci' => '9317012',
            'cod_sis' => '20125485455',
            'email' => 'email@email.com',
            'phone' => '78946543',
            'gender' => 'Masculino',
            'address' => 'Av heroinas ',
            'auxiliar_name' => 'CALCULO I',
            'nro_docs' => 5,
            'nro_certificates' => 4,
        ];
        */

        // $pdf = PDF::loadView('pdf.postulant', $item);
        $pdf = PDF::loadView('admin.printers.layout', compact('users', 'title'));

        return $pdf->stream('archivo.pdf');
    }
}
