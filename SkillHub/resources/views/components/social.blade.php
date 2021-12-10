<ul class="footer-social">
    @if($seet->facebook !== null)
    <li><a href="{{$seet->facebook}}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>

    @endif
    @if($seet->twiter !== null)
    <li><a href="{{$seet->twiter}}" target="_blank"  class="twitter"><i class="fa fa-twitter"></i></a></li>

    @endif
    @if($seet->instgram !== null)
    <li><a href="{{$seet->instgram}}" target="_blank"  class="instagram"><i class="fa fa-instagram"></i></a></li>

    @endif
    @if($seet->youtube !== null)
    <li><a href="{{$seet->youtube}}" target="_blank"  class="youtube"><i class="fa fa-youtube"></i></a></li>

    @endif
    @if($seet->linkedin !== null)
    <li><a href="{{$seet->linkedin}}" target="_blank"  class="linkedin"><i class="fa fa-linkedin"></i></a></li>

    @endif
    
                
            </ul>