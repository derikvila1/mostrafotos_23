@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', '500')
@section('code', '500')
@section('message', 'Oops, algo deu errado com a sua solicitação')
@section('submessage', '')
@section('details', 'Caso sua solicitação seja crítica, entre em contato com o suporte e informe o horário mostrado abaixo')
@section('datetime', Carbon::now())