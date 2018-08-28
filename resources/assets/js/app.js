
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Event = new Vue();
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('survey', require('./components/Survey.vue'));

Vue.component('survey', {

    props: {
        name: String,
        surveyid: String,
        userlist: String
    },
    template: 
    `
        <div class="container">
            <tr>
                <td class="col-sm-8">
                    {{ surveyName }}
                </td>

                <td class="col-sm-2">
                    <button class="btn btn-primary" data-toggle="modal" @click="showUsers(target)" :data-target="target">Add Users</button>
                </td>

                <td class="col-sm-2">
                    <button class="btn btn-success" @click="submitAssignment(surveyid)">Assign Survey</button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" :id="target" tabindex="-1" role="dialog" :aria-labelledby="surveyName" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" :id="surveyName">{{ surveyName }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <li :class="user.class" v-for="user in allUsers" @click="userSelected(allUsers.indexOf(user))" style="cursor: pointer;">
                                {{ user.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    `,

    data()  {
        return {
            surveyName: null,
            target: null,
            allUsers: [],
            selectedUsers: []
        };
    },

    mounted() {
        this.surveyName = this.name;
        this.target = "modal-" + this.surveyid;
        this.allUsers = JSON.parse(this.userlist);
        this.allUsers.forEach(function( user ){
            user.class="list-group-item";
            user.selected="false";
        });
    },

    methods: {
        
        showUsers: function(target){
            targetModal = '#' + target;
            $(targetModal).modal({
                keyboard: false
              })
        },

        userSelected: function(userIndex){
            this.selectedUsers.push(this.allUsers[userIndex].id);
            
            if (this.allUsers[userIndex].selected == true) 
            {
                this.allUsers[userIndex].class = "list-group-item";
                this.allUsers[userIndex].selected = false;
            }
            else
            {
                this.allUsers[userIndex].selected = true;
                this.allUsers[userIndex].class = "list-group-item bg-primary";
            }
            console.log("User selected for index " + userIndex + ": " + this.allUsers[userIndex].selected);
            console.log("Class selected for index " + userIndex + ": " + this.allUsers[userIndex].class);
        },

        submitAssignment: function(surveyId){

            axios.post('/survey/' + surveyId, {
                message: this.selectedUsers,
                surveyId: surveyId
              })
              .then(function (response) {
                console.log('A successful return: ');
                console.log(response);
                Event.$emit('surveyAssigned', {body: response.data.body, id: surveyId});
              })
              .catch(function (error) {
                console.log('An erroneous response: ');
                console.log(error);
              });
            
            console.log('The assignment for survey id ' + surveyId + ' has been submitted');
        }
    }
});
const app = new Vue({
    
    el: '#app',
    
    data: {
        
    },
    
    methods:{
        
    }
    
});
