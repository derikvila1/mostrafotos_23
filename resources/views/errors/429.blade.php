@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', '429')
@section('code', '429')
@section('message', 'Muitas requisições')
@section('submessage', '')
@section('details', 'Vá com calma, você está enviando muitas requisições em pouco tempo')
@section('datetime', Carbon::now())