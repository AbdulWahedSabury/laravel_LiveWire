<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboare</li>
                <li class="breadcrumb-item active">Appointments</li>
                <li class="breadcrumb-item"><a href="#">Create</a></li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-end mb-2">
                </div>
              <div class="card">
                <div class="card-body">
                    <div class="title">
                        <h5>Add New Appointment</h5>
                    </div>
                    <form wire:submit.prevent ="CreateAppointments" id="AddAppointment"  autocomplete="off">
                          <div class="form-group">
                           <div class="form-row">
                               <div class="col-lg-6">
                                <label for="client">Client:</label>
                                <select wire:model.defer="state.client_id" class="form-control @error('client_id') is-invalid @enderror">
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                             </div>
                           </div>
                          </div>
                          <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <!-- <div class="form-group" wire:ignore.self>
                                        <label>Color picker:</label>
                                        <input wire:model.defer="state.color" type="text" class="form-control @error('color') is-invalid @enderror" id="colorPicker">
                                        @error('color')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> -->
                                    <div class="form-group">
                                        <label>Color picker with addon:</label>

                                        <div class="input-group" id="colorPicker">
                                            <input type="text" name="color" class="form-control">

                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentDate">Appointment Date</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <x-datepicker wire:model.defer="state.date" id="appointmentDate" :error="'date'" />
                                            @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentTime">Appointment Time</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <x-timepicker wire:model.defer="state.time" id="appointmentTime" :error="'time'" />
                                            @error('time')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        <div wire:ignore class="form-group my-1 mr-2">
                                <label for="note">Note:</label>
                                <textarea id="note" wire:model.defer='state.text' data-note="@this" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client">Status:</label>
                                    <select wire:model.defer="state.status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        <option value="SCHEDULED">Scheduled</option>
                                        <option value="CLOSED">Closed</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Team Members</label>
                                    <div class="@error('members') is-invalid border border-danger rounded custom-error @enderror">
                                        <x-select2 wire:model="state.members" id="members" placeholder="Select Members">
                                            <option>One</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </x-select2>
                                    </div>
                                    @error('members')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="submitBtn">
                        <button id="save" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
</div>
    @include('livewire/admin/appointments/appointment-css')
    @include('livewire/admin/appointments/appointment-js')
