{{csrf_field()}}      
              <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">email</label>
                          <input type="email" name="email"   value="{{isset($row) ? $row->email : ''}}" class="form-control">
                        </div>
                      </div>

                   
                    </div>
                      </div>
                   
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">message</label>
                          <textarea name="message" cols="60" rows="10">
                            {{isset($row) ? $row->message : ''}}
                          </textarea>
                        </div>
                      </div>
                    <hr>
                <h4 style="color:white">  Replay On Message</h4>
                  <form action="{{route('message.reply',['id'=>$row->id])}}" method="post">
                  @csrf
                  <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">message</label>
                          <textarea name="message" cols="60" rows="10">
                          </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">replay {{$moduleName}} </button>
                  </form>
                   
                      </div>