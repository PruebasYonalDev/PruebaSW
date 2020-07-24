<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
    </style>
    </head>
    <header class="clearfix">
@foreach($alls as $all)
        <h1>N° DE ORDEN {{ $all->id_orden }}</h1>
        <div>
            <div>Software Web</div>
            <div>Envigado<br />Cll # int 201</div>
            <br>
            <div><a href="mailto:company@example.com">softwareweb@softwareweb.com</a></div>
        </div>
        <div>
            <div><span>CLIENTE:  </span><strong>{{ $all->name }}</strong></div>
            <div><span>DIRECCIÓN:  </span><strong>796 Silver Harbour, TX 79273, US</strong></div>
            <div><span>CORREO:  </span> <a href="mailto:{{ $all->email }}">{{ $all->email }}</a></div>
        </div>
@endforeach
    </header>
    <br>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">ID PRODUCTO</th>
                    <th class="desc">NOMBRE PRODUCTO</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id_producto }}</td>
                    <td>{{ $product->nombre_producto }}</td>
                    <td>{{ $product->descripcion_producto }}</td>
                    <td>{{ $product->precio }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="grand total">TOTAL</td>
                    @foreach($alls as $all)
                        <td class="grand total"><strong>${{ $all->total }}</strong></td>
                    
                </tr>
            </tbody>
        </table>
        <br>
        <div id="notices">
            <div>OBSERVACION:</div>
            <div class="notice">{{ $all->observacion }}</div>
            @endforeach
        </div>
    </main>
    <footer>
        Cotización.
    </footer>
</html>