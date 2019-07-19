<template>
    <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            <span class="count-symbol bg-danger" v-if="numberNotifyUnread > 0"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <h6 class="p-3 mb-0">Thông Báo</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item border-bt" v-for="(notify, index) in listNotify" :class="{'unreadNotify': notify.read_at == null }" >
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                    </div>
                </div>
                <a :href="'/admin/pending/news/preview/'+notify.data.news.id" @click="readNotify(notify.id)" class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">1 bài viết cần được phê duyệt</h6>
                    <p class="text-gray ellipsis mb-0">
                        {{ notify.data.news.title }}
                    </p>
                    <p class="text-gray ellipsis mb-0" :title="reFormatDate(notify.created_at)">
                        {{ reFormatDateTime(notify.created_at)}}
                    </p>
                </a>
            </a>
            <a href="/admin/all-notify"><h6 class="p-3 mb-0 text-center">Xem tất cả các thông báo</h6></a>
        </div>
    </li>
</template>
<style>
    .border-bt {
        border-bottom: 1px solid #ebedf2;
    }
    .unreadNotify {
        background-color: #e0eaf5 !important;
    }
</style>
<script>
    import moment from 'moment';
    export default {
        props: ['userid'],
        data() {
            return {
                listNotify : [],
                numberNotifyUnread : '',
                currentUserLogin : '',
            }
        },
        created(){
            this.getCurrentUserLogin();
            this.loadNotify();
            this.numNotifyUnread();
        },
        mounted() {
            Echo.channel('laravel_database_App.Models.User.' + this.userid)
                .notification((notification) => {
                    this.loadOneNotify(notification.id);
                });

        },
        methods: {
            loadOneNotify(id){
                axios.get('/admin/load-notify/' + id)
                    .then(response => {
                        let data = response.data;
                        this.listNotify.unshift({
                            created_at: data.created_at,
                            data: data.data,
                            id: data.id,
                            notifiable_id: data.notifiable_id,
                            read_at: data.read_at,
                        });
                        console.log(this.listNotify);
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            getCurrentUserLogin() {
                axios.get('/getUserLogin')
                    .then(response => {
                        this.currentUserLogin = response.data
                    })
            },
            loadNotify(){
                axios.get('/admin/load-notify')
                    .then(response => {
                        this.listNotify = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            numNotifyUnread(){
                axios.get('/admin/num-notify-unread')
                    .then(response => {
                        this.numberNotifyUnread = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            // parse date dạng string 'DD - MM - YYYY' về dạng date stardard
            parseDate(input) {
                var parts = input.split('/');
                return new Date(parts[2], parts[1]-1, parts[0]);
            },
            // lấy thứ ngày
            getNameDay(day) {
                if (day == 0) return 'CN';
                else if (day == 1) return 'T2';
                else if (day == 2) return 'T3';
                else if (day == 3) return 'T4';
                else if (day == 4) return 'T5';
                else if (day == 5) return 'T6';
                return 'T7';
            },
            // format ngày theo định dạng có thứ ngày 'dd-mm'
            reFormatDateTime(created_at){
                var now = moment(new Date().toISOString().slice(0,10));
                var dateOfNotify = moment(created_at).format('YYYYMMDD');
                var dateDiff  = now.diff(dateOfNotify, 'days')
                var dateWantToParse = moment(created_at).format('DD-MM-YYYY');
                var dateParse = this.parseDate(dateWantToParse)
                var weekday = dateParse.getDay();
                var weekdayName = this.getNameDay(weekday);
                if(dateDiff > 7){
                    return moment(created_at).format('H:mm DD-MM-YYYY')
                }
                else if(dateDiff >= 1 && dateDiff <= 7) {
                    return moment(created_at).format('H:mm') +' ' +weekdayName
                }
                else {
                    return 'Hôm nay ' + moment(created_at).format('H:mm')
                }
            },
            reFormatDate(created_at){
                return moment(created_at).format('DD-MM-YYYY')
            },
            readNotify(id){
                axios.patch('/admin/read-notify/'+ id)
                    .then(response => {
                        this.loadNotify();
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>
