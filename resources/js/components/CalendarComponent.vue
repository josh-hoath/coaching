<template>
    <div class="container">
        <div class="row justify-contnet-center">
            <div class="col-lg-8">
                <form @submit.prevent>
                    <div class="form-group">
                        <label for="session_name">Session Name</label>
                            <input
                                type="text"
                                id="event_name"
                                class="form-control"
                                v-model="newSession.session_name"
                            >
                    </div>
                    <div class="row">
                        <div class="cold-lg-8">
                            <div class="form-group">
                                <label for="date">Date</label>
                                    <input
                                        type="date"
                                        id="date"
                                        class="form-control"
                                        v-model="newSession.date"
                                    >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="time">Time</label>
                                        <input
                                            type="time"
                                            id="time"
                                            class="form-control"
                                            v-model="newSession.time"
                                        >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4" v-if="addingMode">
                        <button class="btn btn-custom" @click="addNewSession">Book Session</button>
                    </div>
                    <template>
                        <div class="col-lg-6 mb-4">
                            <button class="btn btn-success" @click="updateSession">Update</button>
                            <button class="btn btn-danger" @click="deleteSession">Delete</button>
                            <button class="btn btn-warning" @click="addingMode = !addingMode">Cancel</button>
                        </div>
                    </template>
                </form>
            </div>
            <div class="col-lg-8">
                <!-- <FullCalendar @eventClick="showSession" defaultView:="dayGridMonth" :plugins="calendarPlugins" :sessions="sessions"/> -->
            </div>
        </div>
    </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import axios from 'axios'


export default {
    components:{
        FullCalendar // make custom tag avaliable
    },
    data() {
        return {
            calendarPlugins: [ dayGridPlugin, interactionPlugin],
            sessions: "",
            newSession: {
                session_name: "",
                date: "",
                time: ""
            },
            addingMode: true,
            indexToUpdate: " "
        };
    },
    created() {
        this.getSessions();
    },
    methods: {
        addNewSession() {
            axios.post('/api/calendar', {
                ...this.newSession
            })
            .then(data=> {
                this.getSessions(); //update list of getSessions
                this.resetForm();
            })
            .catch(err =>
                // alert("Unable to add session")
                console.log(err.response.data)
            );
        },
        showSession(arg) {
            this.addingMode = false;
            const {id, session, date, time} = this.sessions.find (
                session => session.id === +arg.event.id
            );
            this.indexToUpdate = id;
            this.newSession = {
                session_name: session, // comeback to and see if inserts into db as session_name
                date: date,
                time: time
            };
        },
        updateSession() {
            axios.put('/app/calendar/' + this.indexToUpdate, {
                    ...this.newSession
                })
                .then(resp => {
                    this.resetForm();
                    this.getSessions();
                    this.addingMode = !this.addingMode;
                })
                .catch(err =>
                    // alert('Unable to update event!')
                    console.log(err.response.data)
                );
        },
        deleteSession() {
            axios.delete('/api/calendar/' + this.indexToUpdate)
            .then(resp => {
                this.resetForm();
                this.getSessions();
                this.addingMode = !this.addingMode;

            })
            .catch(err =>
                // alert('Unable to delete event')
                console.log(err.response.data)
            );
        },
        getSessions(){
            axios.get('/api/calendar')
            .then(resp => (this.sessions = resp.data.data))
            .catch(err => console.log(err.response.data));
        },
        resetForm() {
             Object.keys(this.newSession).forEach(key=> {
                 return (this.newSession[key] = "");
             });
        }
    },
    watch: {
        indexToUpdate() {
            return this.indexToUpdate
        }
    }
};

</script>

<style>

@import "~@fullcalendar/daygrid/main.css";
</style>
