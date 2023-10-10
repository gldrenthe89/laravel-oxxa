<?php

namespace nickurt\Oxxa\Api;

class Domains extends AbstractApi
{
    /**
     * @param array $params
     * @return array
     */
    public function check($params)
    {
        return $this->request(array_merge(['command' => 'domain_check'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function del($params)
    {
        return $this->request(array_merge(['command' => 'domain_del'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function epp($params)
    {
        return $this->request(array_merge(['command' => 'domain_epp'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function inf($params)
    {
        return $this->request(array_merge(['command' => 'domain_inf'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'domain_list'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function ns_upd($params)
    {
        return $this->request(array_merge(['command' => 'domain_ns_upd'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function push($params)
    {
        return $this->request(array_merge(['command' => 'domain_push'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function restore($params)
    {
        return $this->request(array_merge(['command' => 'domain_restore'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function upd($params)
    {
        return $this->request(array_merge(['command' => 'domain_upd'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function enableAutoRenew($domainName)
    {
        return $this->request(array_merge(['command' => 'autorenew', 'autorenew' => 'Y', 'sld' => $this->extractSld($domainName), 'tld' => $this->extractTld($domainName)]));
    }

    private function extractSld($domainName): string
    {
        $explodedHost = explode(".", $domainName);
        return $explodedHost[count($explodedHost) - 2];
    }

    private function extractTld($domainName): string
    {
        $explodedHost = explode(".", $domainName);
        return $explodedHost[count($explodedHost) - 1];
    }

    /**
     * @param array $params
     * @return array
     */
    public function disableAutoRenew($domainName)
    {
        return $this->request(array_merge(['command' => 'autorenew', 'autorenew' => 'N', 'sld' => $this->extractSld($domainName), 'tld' => $this->extractTld($domainName)]));
    }
}
