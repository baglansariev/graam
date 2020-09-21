<div class="main-preloader">
    <div class="container">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
        <div class="circle circle-4"></div>
        <div class="circle circle-5"></div>
    </div>
</div>

<style>
    @keyframes scale {
        0% {
            transform: scale(1);
        }
        50%, 75% {
            transform: scale(2.5);
        }
        78%, 100% {
            opacity: 0;
        }
    }
    .main-preloader {
        display: none;
        position: absolute;
        left: 0;
        top: 0;
        background-color: rgba(255, 255, 255, 0.8);
        width: 100%;
        height: 100%;
        z-index: 9999;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        overflow: hidden;
    }

    .circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .circle:before {
        content: "";
        width: 70px;
        height: 70px;
        border-radius: 50%;
        opacity: 0.7;
        animation: scale 2s infinite cubic-bezier(0, 0, 0.49, 1.02);
    }

    .circle-1 {
        background-color: #eed968;
    }
    .circle-1:before {
        background-color: #eed968;
        animation-delay: 200ms;
    }
    .circle-1:after {
        content: 'G';
        position: absolute;
        font-size: 25px;
        color: #fff;
    }

    .circle-2 {
        background-color: #eece68;
    }
    .circle-2:before {
        background-color: #eece68;
        animation-delay: 400ms;
    }
    .circle-2:after {
        content: 'R';
        position: absolute;
        font-size: 25px;
        color: #fff;
    }

    .circle-3 {
        background-color: #eec368;
    }
    .circle-3:before {
        background-color: #eec368;
        animation-delay: 600ms;
    }
    .circle-3:after {
        content: 'A';
        position: absolute;
        font-size: 25px;
        color: #fff;
    }

    .circle-4 {
        background-color: #eead68;
    }
    .circle-4:before {
        background-color: #eead68;
        animation-delay: 800ms;
    }
    .circle-4:after {
        content: 'A';
        position: absolute;
        font-size: 25px;
        color: #fff;
    }

    .circle-5 {
        background-color: #ee8c68;
    }
    .circle-5:before {
        background-color: #ee8c68;
        animation-delay: 1000ms;
    }
    .circle-5:after {
        content: 'M';
        position: absolute;
        font-size: 25px;
        color: #fff;
    }
</style>