<h1>Check on yourself!</h2>

    {{-- creating the form --}}
    <form class="form-control" method="POST" action="results">
    {{-- I am using fieldset for group of related elements in the form  --}}
            <fieldset>
            
            @foreach (App\Models\Heavylifter::all()->take(1) as $idea ) 
            
            <section>

                <h3>Did you...<h3>
                    <div class="column">
                    {{-- Cross-Site Request Forgery Token --}}
                    @csrf
                        <label class="container">
                            <sup>{{$idea->pluck('idea1')->last()}}</sup>
                            <input type="checkbox" name="action1" value="1"/>
                            <span class="checkmark"></span>
                        </label>

                        <br><br>

                        <label class="container">   
                            <sup>{{$idea->pluck('idea2')->last()}}</sup>
                            <input type="checkbox" name="action2" value="1"/>
                            <span class="checkmark"></span>
                        </label>

                        <br><br>
                        
                        <label class="container">    
                    <sup>    {{$idea->pluck('idea3')->last()}}</sup>
                            <input type="checkbox" name="action3" value="1"/>
                            <span class="checkmark"></span>
                            
                        </label>

                    </div>

                    <div class="column">
                        
                        <label class="container">  
                      <sup>  {{$idea->pluck('idea4')->last()}}</sup>
                            <input type="checkbox" name="action4" value="1"/>
                            <span class="checkmark"></span>
                        </label>

                        <br><br>
                        
                        <label class="container">
                        <sup>{{$idea->pluck('idea5')->last()}}</sup>                    
                            <input type="checkbox" name="action5" value="1"/>
                            <span class="checkmark"></span>
                        </label>

                        <br><br>
                        
                        <label class="container">
                        <sup>{{$idea->pluck('idea6')->last()}}</sup>
                            <input type="checkbox" name="action6" value="1"/>
                            <span class="checkmark"></span>
                        </label>

                    </div>
        
                    <button class="button" id="subtitle1" style="display: block" 
                    type="submit" name="formSubmit" value="Submit">Submit!</button>
                </fieldset>
            </form>
            
            @endforeach
        
        </section>
        
        <section>
            <?php
                //collecting all the points
                $total = (
                    +(isset($_POST["action1"]) ? ($_POST["action1"]): 0) + 
                    +(isset($_POST["action2"]) ? ($_POST["action2"]): 0) +
                    +(isset($_POST["action3"]) ? ($_POST["action3"]): 0) +
                    +(isset($_POST["action4"]) ? ($_POST["action4"]): 0) +
                    +(isset($_POST["action5"]) ? ($_POST["action5"]): 0) +
                    +(isset($_POST["action6"]) ? ($_POST["action6"]): 0)
                );         
            ?>
            {{-- hide if it form is not posted --}}
            <div <?php if (isset($_POST["formSubmit"]) === false ){ ?> hidden <?php } ?>>
            {{-- Here go the results --}}
                <?php
                    echo "The total amount of points for the day is... " . $total . "!"; 
                    {{-- isset($_POST["formSubmit"]) ? print ($_POST["action1"]) + ($_POST["action2"]) + ($_POST["action3"]) + ($_POST["action4"]) + ($_POST["action5"]) + ($_POST["action6"])) : NULL;  --}}
                    
                    ?> <br> <?php
                    //-- comment showing with results --}}
                    if ($total === 0) {
                        echo "It's ok! Bet today was tough! Tomorrow is another day. In a meantime, be nice to yourself.";
                    } elseif ( $total > 0 && $total < 2 ) {
                        echo "Well done, every little step counts!";
                    } elseif ($total >= 2 && $total < 4 ) {
                        echo "That's an excellent progress. Keep going!";
                    } elseif ($total > 4 ) {
                        echo "Amazing job! Look at you go!";
                    }
                ?> 
            </div>
        </section>
                

