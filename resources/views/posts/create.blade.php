                    <form action="{{ url('/posts') }}" method="POST">
                        {{ csrf_field() }}
                        
                        <textarea class="form-control {{ $errors->has('post_content') ? ' is-invalid' : '' }}" name="post_content" cols="60" rows="5" placeholder="Co słychać?" style="margin-bottom:10px;">{{ old('post_content') }}</textarea>
                        @if ($errors->has('post_content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('post_content') }}</strong>
                            </span>
                        @endif
                        <button class="btn btn-default float-right" type="submit">Dodaj post</button>
                    </form>