(function($){
    function Stage(id, label){
        this.id = id;
        this.label = label;
    }

    function Builder(){
        this.stages = [];
        this.connections = [];
    }

    Builder.prototype.addStage = function(label){
        var id = 'stage-' + (this.stages.length + 1);
        var stage = new Stage(id, label);
        this.stages.push(stage);
        $('#funnelcraft-builder').append('<div draggable="true" class="stage border rounded p-2 m-2 bg-white" id="'+id+'">'+label+'</div>');
    };

    Builder.prototype.connect = function(fromId, toId){
        this.connections.push({from: fromId, to: toId});
    };

    $(function(){
        var builder = new Builder();
        builder.addStage('Start');
        builder.addStage('Thank You');

        $('#funnelcraft-builder').on('dragstart', '.stage', function(e){
            e.originalEvent.dataTransfer.setData('text/plain', e.target.id);
        });

        $('#funnelcraft-builder').on('drop', '.stage', function(e){
            e.preventDefault();
            var fromId = e.originalEvent.dataTransfer.getData('text');
            var toId = e.target.id;
            if(fromId !== toId){
                builder.connect(fromId, toId);
                alert('Connected '+fromId+' -> '+toId);
            }
        }).on('dragover', '.stage', function(e){
            e.preventDefault();
        });
    });
})(jQuery);
