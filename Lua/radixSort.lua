-- 获取表中位数
local maxBit = function (tt)
    local weight = 10;      -- 十进制
    local bit = 1;
    
    for k, v in pairs(tt) do
        while v >= weight do
            weight = weight * 10;
            bit = bit + 1;  
        end
    end
    return bit;
end
-- 基数排序
local radixSort = function (tt)
    local maxbit = maxBit(tt); 

    local bucket = {};
    local temp = {};
    local radix = 1;
    for i = 1, maxbit do
        for j = 1, 10 do
            bucket[j] = 0;      --- 清空桶
        end
        for k, v in pairs(tt) do
            local remainder = math.floor((v / radix)) % 10 + 1;    
            bucket[remainder] = bucket[remainder] + 1;      -- 每个桶数量自增
        end
        
        for j = 2, 10 do
            bucket[j] = bucket[j - 1] + bucket[j];  -- 每个桶的数量 = 以前桶数量和 + 自个数量
        end 
        -- 按照桶的位置，排序--这个是桶式排序，必须使用倒序，因为排序方法是从小到大，顺序下来，会出现大的在小的上面清空。
        for k = #tt, 1, -1 do
            local remainder = math.floor((tt[k] / radix)) % 10 + 1;
            temp[bucket[remainder]] = tt[k];
            bucket[remainder] = bucket[remainder] - 1;
        end
        for k, v in pairs(temp) do
            tt[k] = v;
        end
        radix = radix * 10;
    end
end;
