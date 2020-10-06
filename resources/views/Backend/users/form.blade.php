{{csrf_field()}}      
              <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email"   value="{{isset($row) ? $row->email : ''}}" class="form-control">
                        </div>
                      </div>
                   

                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">user group</label>
                         
                          <select name="group"  class="form-control" style="color: black">
                           <option value="admin" {{isset($row) &&  $row->group == 'admin'?'selected' : ''}} >
                           admin
                         </option>
                            <option value="user"  {{isset($row) &&  $row->group =='user'?'selected' : ''}}>user
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>