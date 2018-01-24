@extends('layout.principal')
@section('conteudo')
<div class="container">
  <h2>Produtos</h2>
  
  <ul>
    <li><a href="{{action('ProdutoController@novo')}}">Cadastrar Produto</a></li>
  </ul>

  @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
      {!! session('message.content') !!}
    </div>
  @endif
    

  <table id="listagemProdutos" class="table table-bordered">
    <thead>
      <tr>
        <th>Código Produto</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Valor</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Saldo</th>
        <th>Status</th>
        <th>Total</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produtos as $p)
        <tr>
          <td>{{ $p->codigo_produto }}</td>
          <td>{{ $p->descricao }}</td>
          <td>{{ $p->nome }}</td>
          <td>R${{ $p->valor }}</td>
          <td>{{ $p->quantidadeEntrada ? $p->quantidadeEntrada : 0  }}</td>
          <td>{{ $p->quantidadeSaida ? $p->quantidadeSaida : 0 }}</td>
          <td>{{ $saldo = $p->quantidadeEntrada - $p->quantidadeSaida}}</td>
          <td>{{ $saldo == 0 ? "ESGOTADO": "DISPONÍVEL"}}</td>
          <td>R$ {{ $p->valor * $saldo}}</td>
          <td><a href="/Produtos/mostrar/{{ $p->id_produto }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
          <td><a href="/Produtos/remove/{{ $p->id_produto }}"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop