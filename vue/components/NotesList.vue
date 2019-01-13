<template>
    <div class="notes">
        <h1>Список заметок</h1>
        <ul>
            <li v-for="(note, index) in notes" :key="note.id">
                <a href="#" class="" @click="viewNoteDetails(note.id)">{{note.title}}</a>
                <a href="#" class="btn btn-xs btn-primary" @click="editNote(note.id)">
                    <span class="glyphicon glyphicon-pencil"></span> Редактировать
                </a>
                <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteNote(note.id, index)">
                    <span class="glyphicon glyphicon-remove"></span> Удалить
                </a>
            </li>
        </ul>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                notes: [],
            }
        },
        created() {
            this.loadNotesList();
        },
        methods: {
            loadNotesList() {
                axios
                    .get("/api/notes")
                    .then(response => (this.notes = response.data))
                    .catch(error => console.log(error));
            },
            viewNoteDetails(id) {
                this.$router.push('notes/' + id);
            },
            editNote(id) {
                this.$router.push('notes/edit/' + id);
            },
            deleteNote(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/notes/' + id)
                        .then((response) => {
                            this.notes.splice(index, 1);
                        });
                }
            }
        }
    }
</script>

<style scoped>
    .notes {
        border: 1px solid grey;
        border-radius: 10px;
        margin: 10px;
        padding: 10px;
    }
</style>