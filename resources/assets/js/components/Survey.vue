<template>
    <div class="container">
        <tr>
            <td >
                {{ surveyName }}
            </td>

            <td>
                <button class="btn btn-primary" @click="addUsers" data-toggle="modal" :data-target="target">Add Users</button>
            </td>

            <td>
                <button class="btn btn-success">Submit Survey</button>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" :id="target" tabindex="-1" role="dialog" aria-labelledby="selectusers" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectusers">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li v-for="user in remaining">{{ user.name }}</li>
                    <button>Select</button>
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
</template>

<script>
    export default {
        props() {
            name: String;
            surveyId: Number;
            
        },

        data()  {
            return {
                surveyName: null,
                surveyIdNum: null,
                target:null,
                remaining: []
            };
        },
        mounted() {
            this.surveyName = this.name;
            this.surveyIdNum = this.surveyId;
            this.target = this.surveyIdNum

            console.log('Component mounted.')
        },
        methods: {
            
        }
    }
</script>
