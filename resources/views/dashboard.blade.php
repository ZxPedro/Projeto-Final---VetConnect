@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')
<div class="col-10 row justify-content-center">
    <h1 class="text-center" >Agendamentos do Dia</h1>

    <div class="card col-3" style="width: 20rem;">
    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/ce612125-96d6-4376-a8b3-6b72e463ad1e/d6s5d9m-8cbe2096-f452-42e1-a694-ffef7291a4b1.png/v1/fill/w_870,h_588/pedido__gato_png_by_valeconbieberfever_d6s5d9m-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NTg4IiwicGF0aCI6IlwvZlwvY2U2MTIxMjUtOTZkNi00Mzc2LWE4YjMtNmI3MmU0NjNhZDFlXC9kNnM1ZDltLThjYmUyMDk2LWY0NTItNDJlMS1hNjk0LWZmZWY3MjkxYTRiMS5wbmciLCJ3aWR0aCI6Ijw9ODcwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.fm0MgvDNz-_FXO0Ns4l1nm4f3DvmtdF2bnHxALY727E" class="card-img-top" alt="..." style="width: 200px; height: 200px">
        <div class="card-body">
            <h5 class="card-title">Atendimento 01</h5>
            <p class="card-text">Horario: 08:00 <br>Especie: Felina <br>Nome: GIl</p>
            <a href="#" class="btn btn-primary">Confirmar</a>
        </div>
    </div>

    <div class="card col-3" style="width: 20rem;">
    <img src="https://static.wixstatic.com/media/3c8d84_b6e71e82c9ac477c851f59bd7411b4e1~mv2.png/v1/fill/w_695,h_410,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Caramelo_Lingua_Comedouro.png" class="card-img-top" alt="..."style="width: 200px; height: 200px">
        <div class="card-body">
            <h5 class="card-title">Atendimento 02</h5>
            <p class="card-text">Horario: 09:00 <br>Especie: Felina <br>Nome: Fiona</p>
            <a href="#" class="btn btn-primary">Confirmar</a>
        </div>
    </div>

    <div class="card col-3"style="width: 20rem;">
    <img src="https://s2-g1.glbimg.com/s3TFEmxqsjazlJ9HUNihx0epBTw=/0x0:2560x1528/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2018/e/M/Angn6PShGjLAsBxkuczw/garflield.jpg" class="card-img-top" alt="..."style="width: 200px; height: 200px">
        <div class="card-body">
            <h5 class="card-title">Atendimento 03</h5>
            <p class="card-text">Horario: 10:00 <br>Especie: Felina <br>Nome: Garfield</p>
            <a href="#" class="btn btn-primary">Confirmar</a>
        </div>
    </div>

    <div class="card col-3" style="width: 20rem;">
    <img src="https://www.peanuts.com/sites/default/files/cb-color.jpg" class="card-img-top" alt="..." style="width: 200px; height: 200px">
        <div class="card-body">
            <h5 class="card-title">Atendimento 04</h5>
            <p class="card-text">Horario: 13:00 <br>Especie: Felina <br>Nome: Charlie Brown</p>
            <a href="#" class="btn btn-primary">Confirmar</a>
        </div>
    </div>
</div>


@endsection