<?php
/**
 * 反转数组
 * @param  array $arr
 * @return array
 */
    function reverse($arr){
        $n = count($arr);
        $left = 0;
        $right = $n-1;
        while ($left<$right){
            $temp = $arr[$left];
            $arr[$left++] = $arr[$right];
            $arr[$right--] = $temp;
        }
        return $arr;
    }

/**
 * 寻找两个有序数组里相同的元素
 * @param  array $arr1
 * @param  array $arr2
 * @return array
 */
    function common_field($arr1,$arr2){
        $common = [];
        $i = $j = 0;
        $count1 = count($arr1);
        $count2 = count($arr2);
        while ($i<$count1&&$j<$count2){
            if($arr1[$i]<$arr2[$j])$i++;
            elseif ($arr1[$i]>$arr2[$j])$j++;
            else{
                $common[] = $arr1[$i];
                $j++;
                $i++;
            }
        }
        return array_unique($common);
    }
/**
 * 打乱数组
 * @param  array $arr
 * @return array
 */
    function shuffle_arr($arr){
        $n = count($arr);
        for($i=0;$i<$n;$i++){
            $rand = rand(0,$n-1);
            if($rand != $i){
                $temp = $arr[$i];
                $arr[$i] = $arr[$rand];
                $arr[$rand] = $temp;
            }
        }
        return $arr;
    }
function number_alphabet($str)
{
    $res = '';
    $number = preg_split('/[a-zA-Z]+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    $alphabet = preg_split('/\d+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    $count = count($number);
    for ($i = 0; $i < $count; $i++) {
        $res .= $number[$i] . ':' . $alphabet[$i];
    }
    return $res;
}
/**
 * 求n内的质数
 * @param int $n
 * @return array
 */
    function get_prime($num){
        $arr = [2];
        for($i=3;$i<=$num;$i+=2){
            $sqrt = intval(sqrt($i));
            for ($j=3;$j<=$sqrt;$j+=2){
                if($i%$j==0)break;
            }
            if($j>$sqrt)array_push($arr,$i);
        }
        return $arr;
    }


function get_king($n,$m){
        $arr = range(0,$n);
        $i = 0;
        while (count($arr)>1){
            ;
            $arr_shift = array_shift($arr);
            if(++$i % $m != 0){
                array_push($arr,$arr_shift);
            }
        }
        return $arr[0];
    }

    function binary_search($arr,$val){
        $left = 0;
        $right = count($arr)-1;
        while ($left<=$right){
            $mid = intval(($left+$right)/2);
            if($val>$arr[$mid])$left = $mid+1;
            elseif ($val<$arr[$mid])$right = $mid-1;
            else return $mid;
        }
        return -1;
    }
    function get_topk($arr,$k){
        $num = count($arr);
        $min_arr = [];
        for ($i=0;$i<$num;$i++){
            if($i<$k){
                $min_arr[$i] = $arr[$i];
                echo $arr[$i].'<br>';
            }
            else{
                if($i==$k){
                    $max_key =array_search(max($min_arr),$min_arr);
                    $max = $min_arr[$max_key];
                }
                if($arr[$i]<$max){
                    $min_arr[$max_key] = $arr[$i];
                    $max_key =array_search(max($min_arr),$min_arr);
                    $max = $min_arr[$max_key];
                }
            }
        }
        return $min_arr;
    }
    function get_minabs($arr){
        $n = count($arr);
        if($arr[0]*$arr[$n-1]>=0)return $arr[0] >= 0 ? $arr[0] : $arr[$n - 1];
        $left= 0;
        $right = $n-1;
        while ($left<=$right){
            if($left+1==$right)return abs($arr[$left]) < abs($arr[$right]) ? $arr[$left] : $arr[$right];
            $mid = intval(($left+$right)/2);
            if($arr[$mid]<0)$left = $mid;
            else $right = $mid;
        }
    }
    function get_three_sum($arr){
        $n = count($arr);
        $res = [];
        for($i=0;$i<$n;$i++){
            $left = $i+1;
            $right = $n-1;
            while ($left<=$right){
                $sum = $arr[$i] + $arr[$left] + $arr[$right];
                if($sum<0)$left++;
                elseif ($sum>0)$right--;
                else{
                    $res = array_merge($res,[$arr[$i] . ',' . $arr[$left] . ',' . $arr[$right]]);
                    $left++;
                    $right--;
                }
            }
        }
        return $res;
    }
    function get_max_sum($arr){
        $now_sum = $max_sum = 0;
        $n = count($arr);
        for ($i=0;$i<$n;$i++){
            if($now_sum >= 0)$now_sum += $arr[$i];
            else $now_sum = $arr[$i];
        }
        if($now_sum>$max_sum)$max_sum = $now_sum;
        return $max_sum;
    }
$arr = [-10, -9, -8, -4, -2, 0, 1, 2, 3, 4, 5, 6, 9];
var_dump(get_max_sum($arr));

