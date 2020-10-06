{{csrf_field()}} 

                       
                          <textarea name="comment" cols="60" rows="10">
                            {{isset($row) ? $row->comment : ''}}
                          </textarea>
                      