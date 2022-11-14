<?php

namespace atelier\view;

class GalleryView extends AppView {
    public function render() : string{
        $gallery = $this->data;
        $user = $gallery->users()->withPivot('role')->where('role', 'owner')->first();   
        $pics = \atelier\modele\Picture::where('id_galery', '=', $this->request->get['id'])->get();
        $number = $pics->count();
        
        
        $html = <<<EOF
            <div class="info">
                <p>Titre :{$gallery->title}</p>
                <p>Auteur :{$user->username}</p>
                <p>Date de création :{$gallery->created_at}</p>
            </div>

            <div class="container">
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>10</div>
                <div>11</div>
                <div>12</div>
                <div>13</div>
                <div>14</div>
                <div>15</div>
                <div>16</div>
                <div>17</div>
                <div>18</div>
                <div>19</div>
                <div>20</div>
                <div>21</div>
                <div>22</div>
            </div>

            <div class="info-comp">
                <p>Tags :{$gallery->tags}</p>
                <div></div>
                <p>Nombre :{$number}</p>
            </div>
        EOF;

        return $html;
    }
}