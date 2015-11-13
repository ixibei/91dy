<div class="letters_index">
    <div class="letters">
        <p class="initials"><span>历史人物首字母索引:</span>
            @foreach($data['twentySixLetter'] as $val)
                <a target=_self href="/renwu/list_{{strtolower($val)}}.htm">{{$val}}</a>
            @endforeach
        </p>
        
        <p class="initials"><span>人物朝代、地区索引:</span>
            @foreach($data['dynasty'] as $val)
            <a target=_self href="{{$domain}}renwu/list_{{$val->filename}}.htm">{{$val->classname}}</a>
            @endforeach
        </p>
    </div>
</div>