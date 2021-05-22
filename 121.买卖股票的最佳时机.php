<?php
/*
 * @lc app=leetcode.cn id=121 lang=php
 *
 * [121] 买卖股票的最佳时机
 *
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/description/
 *
 * algorithms
 * Easy (56.64%)
 * Likes:    1636
 * Dislikes: 0
 * Total Accepted:    448.9K
 * Total Submissions: 791.1K
 * Testcase Example:  '[7,1,5,3,6,4]'
 *
 * 给定一个数组 prices ，它的第 i 个元素 prices[i] 表示一支给定股票第 i 天的价格。
 *
 * 你只能选择 某一天 买入这只股票，并选择在 未来的某一个不同的日子 卖出该股票。设计一个算法来计算你所能获取的最大利润。
 *
 * 返回你可以从这笔交易中获取的最大利润。如果你不能获取任何利润，返回 0 。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：[7,1,5,3,6,4]
 * 输出：5
 * 解释：在第 2 天（股票价格 = 1）的时候买入，在第 5 天（股票价格 = 6）的时候卖出，最大利润 = 6-1 = 5 。
 * ⁠    注意利润不能是 7-1 = 6, 因为卖出价格需要大于买入价格；同时，你不能在买入前卖出股票。
 *
 *
 * 示例 2：
 *
 *
 * 输入：prices = [7,6,4,3,1]
 * 输出：0
 * 解释：在这种情况下, 没有交易完成, 所以最大利润为 0。
 *
 *
 *
 *
 * 提示：
 *
 *
 * 1
 * 0
 *
 *
 */

// @lc code=start
class Solution
{

    // /**
    //  * @param int[] $prices
    //  * @return int
    //  */
    // public function maxProfit($prices)
    // {
    //     $max = 0;

    //     $total = count($prices);

    //     for ($i = 0; $i < $total; $i ++) {
    //         for ($j = $i + 1; $j < $total; $j ++) {
    //             $difference = $prices[$j] - $prices[$i];
    //             if ($difference > $max) {
    //                 $max = $difference;
    //             }
    //         }
    //     }
    //     // var_dump($pos);

    //     return $max >= 0 ? $max : 0;
    // }

    /**
    * @param int[] $prices
    * @return int
    */
    public function maxProfit($prices)
    {
        $this->prices = $this->removeUnUsed($prices);
        $this->total = count($this->prices);


        // return $this->getMaxProfit($currentMin);
        $minAndDifference = $this->getMinAndDifference();
        $maxAndDifference = $this->getMaxAndDifference();

        // [7, 2, 4, 1]
        // var_dump($minAndDifference, $maxAndDifference);
        // return 1;

        // [4,7,1,2]

        // var_dump($minAndDifference, $maxAndDifference);

        if ($minAndDifference > $maxAndDifference) {
            return $minAndDifference;
        } else {
            return $maxAndDifference;
        }

        // 否则，淘汰最小值，以第二小值取为最小值，取再向下寻找第比目前值大的值
        // return  ? : ;
    }

    public function removeUnUsed($prices)
    {
        $total = count($prices) - 1;
        for ($i = 0; $i < $total; $i++) {
            if ($prices[$i + 1] < $prices[$i]) {
                unset($prices[$i]);
            } else {
                break;
            }
        }

        return array_values($prices);
    }

    public function findMinAndDifferenceThan($compareMin)
    {
        $min = $this->prices[0];
        $minPos = 0;

        // 找出最小值
        for ($i = 1; $i < $this->total; $i ++) {
            // 值比 compareMin 来的大，并且 min 来的小
            if ($this->prices[$i] < $min) {
                if ($this->prices[$i] > $compareMin) {
                    $min = $this->prices[$i];
                    $minPos = $i;
                } else {
                    continue;
                }
            }
        }

        // // 没有找到第二小的数据, 说明差别为 0
        // if ($minPos === -1) {
        //     return [0, 0];
        // }

        // 找出最小值后面的第二小的情况
        $max = $this->prices[$minPos];
        // $maxPos = -1; // 如果找不到，两者的差值为 0
        for ($i = $minPos; $i < $this->total; $i ++) {
            if ($this->prices[$i] > $max) {
                $max = $this->prices[$i];
                // $maxPos = $i;
            }
        }

        return [$min, $max - $min]; // 最小值，两者的差值,
    }

    public function findMaxAndDifferenceThan($compareMax)
    {
        $max = -1;
        $maxPos = -1;

        // 找出最小值
        for ($i = 0; $i < $this->total; $i ++) {
            if ($this->prices[$i] >= $compareMax) {
                // 过滤掉过大的数据
                continue;
            } elseif ($this->prices[$i] > $max) {
                $max = $this->prices[$i];
                $maxPos = $i;
            } else {
                continue;
            }
        }


        $min = $this->prices[0];
        // $maxPos = -1; // 如果找不到，两者的差值为 0
        for ($i = $maxPos - 1; $i >= 0; $i --) {
            if ($this->prices[$i] < $min) {
                $min = $this->prices[$i];
                // var_dump($i);
            }
        }

        // var_dump($max, $min);


        return [$max, $max - $min]; // 最小值，两者的差值,
    }



    public function getMinAndDifference()
    {
        // 找出最小值，以及最小值后面的最大值
        $currentMin = -1;

        $currentMinData = $this->findMinAndDifferenceThan($currentMin);
        while (true) {

            // 找出第二小值, 以及第二小值后面的最大值
            $secondMinData = $this->findMinAndDifferenceThan($currentMinData[0]);

            // [2,1,2,1,0,1,2]
            // [3,2,6,5,0,3]
            // [4,7,1,2]
            // [543, 542, 541,540,539,541,540,542,539,538, 537, 0, 0]


            // var_dump($currentMinData, $secondMinData);

            // 两者对比下，最小值的已经是最大的了，就输出，
            if ($currentMinData[1] >= $secondMinData[1]) {
                return $currentMinData[1]; // currentMinData 就已经是最大值了
            } else {
                $currentMinData = $secondMinData;
            }
        }
    }

    public function getMaxAndDifference()
    {
        // 找出最小值，以及最小值后面的最大值
        $currentMax = 1000000;

        $currentMaxData = $this->findMaxAndDifferenceThan($currentMax);
        while (true) {

            // 找出第二小值, 以及第二小值后面的最大值
            $secondMaxData = $this->findMaxAndDifferenceThan($currentMaxData[0]);

            // [11,4,7,1,2]

            // var_dump($currentMaxData, $secondMaxData);

            if ($currentMaxData[1] >= $secondMaxData[1]) {
                return $currentMaxData[1];
            } else {
                $currentMaxData = $secondMaxData;
            }
        }
    }
}
// @lc code=end
