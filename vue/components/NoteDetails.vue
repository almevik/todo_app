<template>
    <div class="note">
        <h1>Просмотр заметки с ID={{note.id}}</h1>
        <form>
        <div>
            <label for="title">Заголовок</label>
            <span>{{note.title}}</span>
        </div>
        <div>
            <label for="date">Дата</label>
            <span>{{note.date}}</span>
        </div>
        <div>
            <label for="text">Текст</label>
            <span>{{note.text}}</span>
        </div>
        </form>    
    </div>
</template>

<script>
import axios from 'axios';
    
export default {
    data() {
        return {
            note: {}
        }
    },
    created() {
        this.loadNoteDetails(this.$route.params.id);
    },
        
    methods: {
        loadNoteDetails(id) {
            axios
              .get("/api/notes/"+id)
              .then(response => (this.note = response.data))
              .catch(error => console.log(error));                
        },
        deleteNote(id) {
            axios
                .get("/api/notes/delete/"+id)
                .then(response => (this.note = response.data))
                .catch(error => console.log(error));
        }
    },
    
    watch: {
        '$route.params.id' (id) {
            this.loadNoteDetails(id);
        }
    }
    
    }    
</script>

<style scoped>
    .note {
        border: 1px solid grey;
        border-radius: 10px;
        margin: 10px 0;
        padding: 10px;  
    }
</style>