<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF</title>

    <style>
        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 12px;
        }

        td {
            text-align: left;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td width="50%" valign="top">
                <p><strong>Descripcion:</strong> {{$cartilla->descripcion}}</p>
            </td>
        </tr>
    </table>

    <table id="detalles" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha partido</th>
                <th>Grupo</th>
                <th>Local</th>
                <th>Local Gol</th>
                <th>Visitante</th>
                <th>Visitante Gol</th>
                <th>Puntaje</th>
                <th>Res.</th>
                <th>Res.</th>
            </tr>

        </thead>
        <tbody>
            {{ $puntaje_total = 0 }}
            @foreach($partidos as $item)
            <tr>
                <td>{{ $item->cartillapartidos_id }}</td>
                <td>{{ $item->partidos_fecha_partido }}</td>
                <td style="text-align: center;">{{ $item->grupos_nombre }}</td>
                <td>{{ $item->paises_local_nombre }}</td>
                <td style="text-align: center;">{{ $item->cartillapartidos_local_goal }}</td>
                <td>{{ $item->paises_visitante_nombre }}</td>
                <td style="text-align: center;">{{ $item->cartillapartidos_visitante_goal }}</td>
                <td style="text-align: center;">{{ $item->cartillapartidos_puntaje }}</td>
                <td style="text-align: center;">{{ $item->partidos_local_goal }}</td>
                <td style="text-align: center;">{{ $item->partidos_visitante_goal }}</td>

                {{ $puntaje_total = $puntaje_total + $item->cartillapartidos_puntaje; }}
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total</th>
                <th>{{ $puntaje_total }}</th>
            </tr>
        </tfoot>
    </table>


</body>

</html>