@extends('myTemplate')
@section('myFriend')
    <div class="mt-3">
        <?php
            $listFriend = array();
            $listUser = array();
        ?>
        @if($friends->count() > 0)
            @foreach ($friends as $f)
                @if($f->user_id_send == $_SESSION['login']->user_id)
                    <?php
                        $listFriend[] = $f->user_id_get
                    ?>
                @endif
            @endforeach
            @foreach ($user as $u)
                <?php
                    $listUser[] = $u
                ?>
            @endforeach
            <?php
                if($listFriend == ''){
                    sort($listFriend);
                    $d = 0;
                    echo count($listUser);
                    for ($i=0; $i < count($listFriend); $i++) { 
                        for ($j=$d; $j < count($listUser); $j++) {
                            if($user[$j]->user_id == $listFriend[$i]){
                                array_splice($listUser, 1, 1);
                                $d = $j;
                                break;
                            }
                        }
                    }
                    echo count($listUser);
                } else 
                    $listUser = $user
                
            ?>
            <div class="row">
                @foreach ($listUser as $u)
                    @if($u->user_id != $_SESSION['login']->user_id)
                        {{$u}}
                    @endif
                @endforeach
            </div>
        @else
            <div class="row">
                @foreach ($user as $u)
                    @if($u->user_id != $_SESSION['login']->user_id)
                        {{$u}}
                    @endif
                @endforeach
            </div>
        @endif 
    </div>
@endsection