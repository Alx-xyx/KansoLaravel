<x-layouts.defaultComponent>
    <x-slot:title>Integracion de Mercado Pago</x-slot:title>
    <h1 class="mb-3">Integracion de MP</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productosCheckout as $productoCheckout)
                <tr>
                    <td>{{$productoCheckout->nombre}}</td>
                    <td>{{$productoCheckout->precio}}</td>
                    <td>1</td>
                    <td>{{$productoCheckout->precio}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><b>Total a pagar</b></td>
                <td><b>{{$productoCheckout->sum('precio')}}</b></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ $checkout_url }}" method="POST">
        <button type="submit" class="btn btn-primary">Comprar</button>
    </form>
</x-layouts.defaultComponent>