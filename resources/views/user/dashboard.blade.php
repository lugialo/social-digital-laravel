@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    .destaque {
        background-color: #007bff;
        color: white;
        border-radius: .25rem;
        padding: 1rem 1.25rem;
    }
</style>
@endpush

@section('content')
<div class="mb-4">
    <img src="https://placehold.co/1200x300/007bff/white?text=Social+Digital"
         class="img-fluid rounded" alt="Social Digital">
</div>

<div class="destaque mb-4">
    <p class="mb-0">
        Devido ao grande aumento da pobreza no Brasil e que vem crescendo
        gradativamente a cada ano, deve-se observar que o trabalho em acolher e proporcionar apoio
        para o maior número de famílias e indivíduos necessitados é um dever de organizações
        governamentais, mas que pode ser idealizado e realizado também com a criação de
        organizações não governamentais (ONG) privadas para que seja possível atender a população
        de modo geral e imediata.
    </p>
</div>

<p style="text-align: justify;">
    No Brasil, o serviço de assistência social é provido em maior escala por
    organizações governamentais, que atuam em todo território nacional, porém, por ser um projeto
    de apoio de larga escala, e que necessita de um acompanhamento constante, acaba se
    tornando uma tarefa dificultosa e com grandes problemas visíveis, como a má gestão
    e demora no atendimento do serviço prestado. Isso acaba gerando instabilidades e
    diferenças para cada região, por existirem mais ou menos projetos e metodologias realizadas
    pelo governo de cada estado.
</p>

<p style="text-align: justify;">
    A tecnologia evoluiu a ponto de ser possível a criação de softwares, sistemas de
    controles, geração de relatórios, painéis de gestão entre vários outros métodos de
    desenvolvimento tecnológicos que possibilitam uma melhora no gerenciamento dos serviços
    prestados por uma empresa.
</p>

<div class="destaque mb-4">
    <p class="mb-0">
        Uma assistência social pode ser automatizada com o desenvolvimento de um
        software de controle, visando um melhor serviço de entrega para as famílias e indivíduos que
        fazem parte do projeto colaborativo.
    </p>
</div>

<p style="text-align: justify;">
    A Social Digital é uma aplicação web destinada ao assistente social, para que consiga agilizar
    seu trabalho.
</p>
@endsection
