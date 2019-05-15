<style>
    .morphing-btn-wrap {
  display: inline-block;
  position: relative;
  text-align: center;
}

.morphing-btn {
  -webkit-transition: background 0.3s, color 0.2s 0.2s, width 0.2s 0s;
  -moz-transition: background 0.3s, color 0.2s 0.2s, width 0.2s 0s;
  -o-transition: background 0.3s, color 0.2s 0.2s, width 0.2s 0s;
  transition: color 0.3s 0.2s, width 0.2s 0s;
  white-space: nowrap;
  box-sizing: border-box;
}

.morphing-btn_circle {
  color: transparent !important;
  padding-left: 0;
  padding-right: 0;
  width: 35.6px !important;

  /* Override inline style rule */
  -webkit-transition: color 0.2s 0s, width .3s 0.2s;
  -moz-transition: color 0.2s 0s, width .3s 0.2s;
  -o-transition: color 0.2s 0s, width .3s 0.2s;
  transition: color 0.2s 0s, width .3s 0.2s;
}

.morphing-btn-clone {
  position: fixed;
  background: #6797c5;
  border-radius: 50%;
  z-index: 3;
  -webkit-transition: all 0.5s cubic-bezier(.65, .05, .36, 1);
  -moz-transition: all 0.5s cubic-bezier(.65, .05, .36, 1);
  -o-transition: all 0.5s cubic-bezier(.65, .05, .36, 1);
  transition: all 0.5s cubic-bezier(.65, .05, .36, 1);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.morphing-btn-clone_visible {
  display: block;
  -webkit-transform: scale(1) !important;
  -moz-transform: scale(1) !important;
  -ms-transform: scale(1) !important;
  -o-transform: scale(1) !important;
  transform: scale(1) !important;
}

.fancybox-morphing .fancybox-bg {
  background: #6797c5;
  opacity: 1;
}

.fancybox-morphing .fancybox-toolbar {
  top: 20px;
  right: 40px;
}

.fancybox-morphing .fancybox-button--close {
  background: rgba(0, 0, 0, 0.2);
  border-radius: 50%;
  color: #fff;
}

.fancybox-morphing .fancybox-button--close::after,
.fancybox-morphing .fancybox-button--close::before {
    height: 1.55px;
    width: 22px;
    left: calc(50% - 11px);
}

.fancybox-morphing .fancybox-button--close:hover {
  background: rgba(0, 0, 0, 0.25);
}

/* Styling for element used in example */

#morphing-content {
  margin: 0;
  position: relative;
  background: transparent;
  color: #fff;
  padding: 6em 10vw;
  line-height: 2;
  z-index: 3;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

#morphing-content a {
  color: #fff;
}
</style>

<style media="screen">
Advanced example - Confirm dialog

https://codepen.io/fancyapps/pen/PmpePO

*/

.fc-container .fancybox-bg {
  background: #eee;
}

.fancybox-is-open.fc-container .fancybox-bg {
  opacity: .95;
}

.fc-content {
  box-shadow: 10px 10px 60px -25px;
  max-width: 550px;
}

/* Custom animation */

.fancybox-fx-material.fancybox-slide--previous,
.fancybox-fx-material.fancybox-slide--next {
  opacity: 0;
  transform: translateY(-60px) scale(1.1);
}

.fancybox-fx-material.fancybox-slide--current {
  opacity: 1;
  transform: translateY(0) scale(1);
}

/*

Advanced example - Product quick view

*/

.quick-view-container {
  background: rgba(10, 10, 10, .85);
}

.quick-view-content {
  bottom: 0;
  height: calc(100% - 40px);
  left: 0;
  margin: auto;
  max-height: 650px;
  max-width: 980px;
  position: absolute;
  right: 0;
  top: 0;
  width: calc(100% - 40px);
}

.quick-view-carousel {
  background: #fff;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  width: 57%;
}

.quick-view-carousel .fancybox-stage {
  bottom: 30px;
}

.quick-view-aside {
  background: #fff;
  bottom: 30px;
  color: #777;
  left: auto;
  padding: 50px 0 30px 0;
  position: absolute;
  right: 0;
  top: 30px;
  width: 43%;
}

.quick-view-aside::before,
.quick-view-aside::after {
  bottom: 0;
  content: '';
  left: 0;
  position: absolute;
  top: 0;
}

.quick-view-aside::before {
  background: #f4f4f4;
  width: 8px;
}

.quick-view-aside::after {
  background: #e9e9e9;
  width: 1px;
}

.quick-view-aside>div {
  height: 100%;
  overflow: auto;
  padding: 5vh 30px 0 30px;
  text-align: center;
}

.quick-view-aside>div>p {
  font-size: 90%;
}

.quick-view-close {
  background: #f0f0f0;
  border: 0;
  color: #222;
  cursor: pointer;
  font-family: Arial;
  font-size: 14px;
  height: 44px;
  margin: 0;
  padding: 0;
  position: absolute;
  right: 0;
  text-indent: -99999px;
  top: 30px;
  transition: all .2s;
  width: 44px;
}

.quick-view-close:hover {
  background: #e4e4e4;
}

.quick-view-close::before,
.quick-view-close::after {
  background-color: #222;
  content: '';
  height: 18px;
  left: 22px;
  position: absolute;
  top: 12px;
  width: 1px;
}

.quick-view-close:before {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

.quick-view-close:after {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}

.quick-view-bullets {
  bottom: 0;
  left: 0;
  list-style: none;
  margin: 0;
  padding: 0;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  text-align: center;
  width: 100%;
  z-index: 99999;
}

.quick-view-bullets li {
  display: inline-block;
  vertical-align: top;
}

.quick-view-bullets li a {
  display: block;
  height: 30px;
  position: relative;
  width: 20px;
}

.quick-view-bullets li a span {
  background: #d4d2d2;
  border-radius: 99px;
  height: 10px;
  left: 50%;
  overflow: hidden;
  position: absolute;
  text-indent: -99999px;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 10px;
}

.quick-view-bullets li.active a span {
  background: #ff4453;
}

/*
// End of examples
*/
</style>


<style media="screen">
transition: all .5s;
}

/* When inside current slide */

.fancybox-slide--current #message {
top: 0;
}

/* Different effect when fanyBox is closing; optional */

.fancybox-is-closing #message {
top: 0;
transform: scale(1.5);
}

/*

Advanced example - Customized layout

*/

@media all and (min-width: 600px) {

/* Change color for backdrop */
.fancybox-custom-layout .fancybox-bg {
    background: #fcfaf9;
}

.fancybox-custom-layout.fancybox-is-open .fancybox-bg {
    opacity: 1;
}

/* Move caption area to the right side */
.fancybox-custom-layout .fancybox-caption {
    background: #f1ecec;
    bottom: 0;
    color: #6c6f73;
    left: auto;
    padding: 30px 20px;
    right: 44px;
    top: 0;
    width: 256px;
}

.fancybox-custom-layout .fancybox-caption h3 {
    color: #444;
    font-size: 21px;
    line-height: 1.3;
    margin-bottom: 24px;
}

.fancybox-custom-layout .fancybox-caption a {
    color: #444;
}

/* Remove gradient from caption*/
.fancybox-custom-layout .fancybox-caption::before {
    display: none;
}

/* Adjust content area position */
.fancybox-custom-layout .fancybox-stage {
    right: 300px;
}

/* Align buttons at the right side  */
.fancybox-custom-layout .fancybox-toolbar {
    background: #3b3b45;
    bottom: 0;
    left: auto;
    right: 0;
    top: 0;
    width: 44px;
}

/* Remove background from all buttons */
.fancybox-custom-layout .fancybox-button {
    background: transparent;
}

/* Navigation arrows */
.fancybox-custom-layout .fancybox-navigation .fancybox-button div {
    padding: 6px;
    background: #fcfaf9;
    border-radius: 50%;
    transition: opacity .2s;
    box-shadow: 0 2px 1px -1px rgba(0, 0, 0, 0.2), 0 1px 1px 0 rgba(0, 0, 0, 0.14), 0 1px 3px 0 rgba(0, 0, 0, 0.12);
    opacity: .7;
}

.fancybox-custom-layout .fancybox-navigation .fancybox-button:not([disabled]):hover div {
    opacity: 1;
}

.fancybox-custom-layout .fancybox-navigation .fancybox-button[disabled] {
    color: #999;
}

.fancybox-custom-layout .fancybox-navigation .fancybox-button:not([disabled]) {
    color: #333;
}

/* Reposition right arrow */
.fancybox-custom-layout .fancybox-button--arrow_right {
    right: 308px;
}
}

</style>
