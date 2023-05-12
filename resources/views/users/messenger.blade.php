@extends('users.layout', ['tab' => 'api_messenger'])

@section('main_content')
    <div class="card">
        <div class="card-body">
            <h1>@lang('users.attributes.api_messenger')</h1>
            <hr class="my-4">

            {!! Form::model($user->messenger, ['method' => 'PATCH', 'route' => ['users.messenger.update']]) !!}

            <div class="form-group row">
                {!! Form::label('bale_bot_token', __('users.attributes.bale_bot_token'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('bale_bot_token', null, ['class' => 'form-control' . ($errors->has('bale_bot_token') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.bale_bot_token')]) !!}

                    @error('bale_bot_token')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('bale_channel_chat_id', __('users.attributes.bale_channel_chat_id'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('bale_channel_chat_id', null, ['class' => 'form-control' . ($errors->has('bale_channel_chat_id') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.bale_channel_chat_id')]) !!}

                    @error('bale_channel_chat_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                {!! Form::label('telegram_bot_token', __('users.attributes.telegram_bot_token'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('telegram_bot_token', null, ['class' => 'form-control' . ($errors->has('telegram_bot_token') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.telegram_bot_token')]) !!}

                    @error('telegram_bot_token')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('telegram_channel_chat_id', __('users.attributes.telegram_channel_chat_id'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('telegram_channel_chat_id', null, ['class' => 'form-control' . ($errors->has('telegram_channel_chat_id') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.telegram_channel_chat_id')]) !!}

                    @error('telegram_channel_chat_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                {!! Form::label('eitaa_bot_token', __('users.attributes.eitaa_bot_token'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('eitaa_bot_token', null, ['class' => 'form-control' . ($errors->has('eitaa_bot_token') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.eitaa_bot_token')]) !!}

                    @error('eitaa_bot_token')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('eitaa_channel_chat_id', __('users.attributes.eitaa_channel_chat_id'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('eitaa_channel_chat_id', null, ['class' => 'form-control' . ($errors->has('eitaa_channel_chat_id') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.eitaa_channel_chat_id')]) !!}

                    @error('eitaa_channel_chat_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group offset-sm-2">
                {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection
