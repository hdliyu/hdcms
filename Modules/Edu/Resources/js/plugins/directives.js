import Vue from 'vue'
Vue.directive('highligh', {
    inserted: function(el) {
        el.querySelectorAll('pre code').forEach(block => {
            hljs.highlightBlock(block)
        })
    }
})
