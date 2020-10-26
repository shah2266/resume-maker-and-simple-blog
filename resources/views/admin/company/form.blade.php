            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group {{ $errors->has('image') ? ' has-error':'' }}">
                        <input type="file" name="image" class="file">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control" disabled
                                   placeholder="Upload Image (Only-jpeg, png)">
                            <span class="input-group-btn">
                                <button class="browse btn btn-success" type="button"><i
                                        class="glyphicon glyphicon-search"></i>
                                    Browse</button>
                            </span>

                        </div>
                    </div>

                    <div class="{{ $errors->has('image') ? ' has-error':'' }}">
                        @if ($errors->has('image'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('company_name') ? ' has-error':'' }}">
                                <input type="text"
                                       class="form-control {{ $errors->has('company_name') ? ' has-error':'' }} "
                                       id="company_name" name="company_name" value="{{ old('company_name') ?? $company->company_name }}"
                                       placeholder="Company name">
                                <span class="fa fa-building form-control-feedback"></span>
                                @if ($errors->has('company_name'))
                                    <span class="help-block" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('address') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('address') ? ' has-error':'' }} "
                                       id="address" name="address" value="{{ old('address') ?? $company->address }}" placeholder="Address">
                                <span class="fa fa-map-marker form-control-feedback"></span>
                                @if ($errors->has('address'))
                                    <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('email') ? ' has-error':'' }} "
                                       id="email" name="email" value="{{ old('email') ?? $company->email }}" placeholder="Company Email">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('phone') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('phone') ? ' has-error':'' }} "
                                       id="phone" name="phone" value="{{ old('phone') ?? $company->phone }}" placeholder="Contact Number">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('phone'))
                                    <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('telephone') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('telephone') ? ' has-error':'' }} "
                                       id="telephone" name="telephone" value="{{ old('telephone') ?? $company->telephone }}" placeholder="Telephone Number">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('telephone'))
                                    <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('help_line') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('help_line') ? ' has-error':'' }} "
                                       id="help_line" name="help_line" value="{{ old('help_line') ?? $company->help_line }}" placeholder="Help desk number">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('help_line'))
                                    <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('help_line') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div
                                class="form-group has-feedback {{ $errors->has('copy_right_text') ? ' has-error':'' }}">
                                <input type="text"
                                       class="form-control {{ $errors->has('copy_right_text') ? ' has-error':'' }} "
                                       id="copy_right_text" name="copy_right_text" value="{{ old('copy_right_text') ?? $company->copy_right_text }}"
                                       placeholder="Copy right text">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('copy_right_text'))
                                    <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('copy_right_text') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group has-feedback {{ $errors->has('social_link_icon_1') ? ' has-error':'' }}">
                                        <select class="form-control select2 {{ $errors->has('social_link_icon_1') ? ' has-error':'' }}" style="width: 100%;" id="social_link_icon_1" name="social_link_icon_1">
                                            <option selected="selected">Select icon</option>
                                            @include('admin.includes.icons', [ "companyIcon" => $company->social_link_icon_1 ?? old('social_link_icon_1')])
                                        </select>
                                        @if ($errors->has('social_link_icon_1'))
                                            <span class="help-block" role="alert">
                                                <strong>{{ $errors->first('social_link_icon_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link1') ? ' has-error':'' }}">
                                        <input type="text"
                                               class="form-control {{ $errors->has('social_link1') ? ' has-error':'' }} "
                                               id="social_link1" name="social_link1" value="{{ old('social_link1') ?? $company->social_link1 }}"
                                               placeholder="Social Link 1">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link1'))
                                            <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group has-feedback {{ $errors->has('social_link_icon_2') ? ' has-error':'' }}">
                                        <select class="form-control select2 {{ $errors->has('social_link_icon_2') ? ' has-error':'' }}" style="width: 100%;" id="social_link_icon_2" name="social_link_icon_2">
                                            <option selected="selected">Select icon</option>
                                            @include('admin.includes.icons', ['companyIcon' => $company->social_link_icon_2 ?? old('social_link_icon_2') ])
                                        </select>
                                        @if ($errors->has('social_link_icon_2'))
                                            <span class="help-block" role="alert">
                                                <strong>{{ $errors->first('social_link_icon_2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link2') ? ' has-error':'' }}">
                                        <input type="text"
                                               class="form-control {{ $errors->has('social_link2') ? ' has-error':'' }} "
                                               id="social_link2" name="social_link2" value="{{ old('social_link2') ?? $company->social_link2 }}"
                                               placeholder="Social Link 2">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link2'))
                                            <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group has-feedback {{ $errors->has('social_link_icon_3') ? ' has-error':'' }}">
                                        <select class="form-control select2 {{ $errors->has('social_link_icon_3') ? ' has-error':'' }}" style="width: 100%;" id="social_link_icon_3" name="social_link_icon_3">
                                            <option selected="selected">Select icon</option>
                                            @include('admin.includes.icons', ['companyIcon' => $company->social_link_icon_3 ?? old('social_link_icon_3') ])
                                        </select>
                                        @if ($errors->has('social_link_icon_3'))
                                            <span class="help-block" role="alert">
                                                <strong>{{ $errors->first('social_link_icon_3') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link3') ? ' has-error':'' }}">
                                        <input type="text"
                                               class="form-control {{ $errors->has('social_link3') ? ' has-error':'' }} "
                                               id="social_link3" name="social_link3" value="{{ old('social_link3') ?? $company->social_link3 }}"
                                               placeholder="Social Link 3">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link3'))
                                            <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group has-feedback {{ $errors->has('social_link_icon_4') ? ' has-error':'' }}">
                                        <select class="form-control select2 {{ $errors->has('social_link_icon_4') ? ' has-error':'' }}" style="width: 100%;" id="social_link_icon_4" name="social_link_icon_4">
                                            <option selected="selected">Select icon</option>
                                            @include('admin.includes.icons', ['companyIcon' => $company->social_link_icon_4 ?? old('social_link_icon_4') ])
                                        </select>
                                        @if ($errors->has('social_link_icon_4'))
                                            <span class="help-block" role="alert">
                                                <strong>{{ $errors->first('social_link_icon_4') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link4') ? ' has-error':'' }}">
                                        <input type="text"
                                               class="form-control {{ $errors->has('social_link4') ? ' has-error':'' }} "
                                               id="social_link4" name="social_link4" value="{{ old('social_link4') ?? $company->social_link4 }}"
                                               placeholder="Social Link 4">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link4'))
                                            <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group has-feedback {{ $errors->has('social_link_icon_5') ? ' has-error':'' }}">
                                        <select class="form-control select2 {{ $errors->has('social_link_icon_5') ? ' has-error':'' }}" style="width: 100%;" id="social_link_icon_5" name="social_link_icon_5">
                                            <option selected="selected">Select icon</option>
                                            @include('admin.includes.icons', ['companyIcon' => $company->social_link_icon_5 ?? old('social_link_icon_5') ])
                                        </select>
                                        @if ($errors->has('social_link_icon_5'))
                                            <span class="help-block" role="alert">
                                                <strong>{{ $errors->first('social_link_icon_5') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link5') ? ' has-error':'' }}">
                                        <input type="text"
                                               class="form-control {{ $errors->has('social_link5') ? ' has-error':'' }} "
                                               id="social_link5" name="social_link5" value="{{ old('social_link5') ?? $company->social_link5 }}"
                                               placeholder="Social Link 5">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link5'))
                                            <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link5') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="form-group">Map Setting <a href="https://www.latlong.net/"
                                                           target="_blank">https://www.latlong.net/</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('latitude') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('latitude') ? ' has-error':'' }} "
                               id="latitude" name="latitude" value="{{ old('latitude') ?? $company->latitude }}" placeholder="Latitude">
                        <span class="fa fa-map-marker form-control-feedback"></span>
                        @if ($errors->has('latitude'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('latitude') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('longitude') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('longitude') ? ' has-error':'' }} "
                               id="longitude" name="longitude" value="{{ old('longitude') ?? $company->longitude }}" placeholder="Longitude">
                        <span class="fa fa-map-marker form-control-feedback"></span>
                        @if ($errors->has('longitude'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('longitude') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('map_content') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('map_content') ? ' has-error':'' }} "
                               id="map_content" name="map_content" value="{{ old('map_content') ?? $company->map_content }}"
                               placeholder="Map Content">
                        <span class="fa fa-text form-control-feedback"></span>
                        @if ($errors->has('map_content'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('map_content') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('status') ? ' has-error':'' }}">

                        <select class="form-control select2" name="status" style="width: 100%;">
                            @foreach ($company->statusOptions() as $statusOptionsKey => $statusOptionsValue)
                                <option value="{{ $statusOptionsKey }}" {{ $company->status == $statusOptionsValue ? 'selected' : '' }}> {{ $statusOptionsValue }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>




